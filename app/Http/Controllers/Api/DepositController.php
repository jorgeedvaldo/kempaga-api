<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Deposit\StoreDepositRequest;
use App\Helpers\TransactionHelper;
use App\Models\Transaction;
use App\Models\TransactionEntry;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

/**
 * Controlador de Depósitos (Agentes/Admin).
 *
 * Permite que agentes e administradores registem a entrada
 * de dinheiro real na carteira de um utilizador.
 *
 * O agente não "cria" dinheiro — apenas regista no sistema
 * a entrada de dinheiro físico recebido do cliente.
 * Isto garante controlo e auditoria completa.
 *
 * Fluxo:
 * 1. Agente recebe dinheiro físico do cliente
 * 2. Agente autentica-se na API com o seu token
 * 3. Agente faz POST /api/deposits com user_id e montante
 * 4. Sistema valida permissões, cria transação, atualiza saldo e regista no ledger
 */
class DepositController extends Controller
{
    /**
     * Listar depósitos processados pelo agente autenticado.
     *
     * Retorna todas as transações do tipo 'deposit' onde o sender_id
     * corresponde ao agente autenticado, ordenadas do mais recente.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(\Illuminate\Http\Request $request): JsonResponse
    {
        $query = Transaction::where('sender_id', $request->user()->id)
            ->where('transaction_type', 'deposit')
            ->with(['receiver:id,first_name,last_name,image_url,email,phone']);

        // Filtros opcionais
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $deposits = $query->orderBy('created_at', 'desc')->paginate(20);

        return response()->json($deposits);
    }

    /**
     * Registar um depósito na carteira de um utilizador.
     *
     * Processo:
     * 1. Validar que o utilizador destinatário existe e tem carteira
     * 2. Dentro de uma transação DB:
     *    - Creditar a carteira do utilizador
     *    - Criar registo de transação (tipo: deposit)
     *    - Criar lançamento contabilístico (crédito no ledger)
     *
     * @param  StoreDepositRequest  $request
     * @return JsonResponse
     */
    public function store(StoreDepositRequest $request): JsonResponse
    {
        $agent = $request->user();
        $data = $request->validated();

        // 1. Verificar utilizador destinatário
        $targetUser = User::findOrFail($data['user_id']);

        $amount = (float) $data['amount'];
        $charge = TransactionHelper::calculateCharge($amount, 'deposit');
        $netAmount = $amount - $charge;

        try {
            // 2. Processar o depósito dentro de uma transação DB
            $transaction = DB::transaction(function () use ($agent, $targetUser, $amount, $charge, $netAmount, $data) {

                $wallet = \App\Models\Wallet::where('user_id', $targetUser->id)->lockForUpdate()->first();

                if (!$wallet) {
                    throw new \Exception('Carteira do utilizador não encontrada.', 404);
                }

                // Creditar a carteira do utilizador
                $wallet->balance += $netAmount;
                $wallet->save();

                // Criar registo de transação (depósito)
            $transaction = Transaction::create([
                'trx_id'           => TransactionHelper::generateTrxId(),
                'user_id'          => $targetUser->id,
                'type'             => 'receive',
                'transaction_type' => 'deposit',
                'amount'           => $amount,
                'charge'           => $charge,
                'net_amount'       => $netAmount,
                'balance_after'    => $wallet->balance,
                'sender_id'        => $agent->id,     // Agente que processou
                'receiver_id'      => $targetUser->id, // Utilizador que recebe
                'note'             => $data['note'] ?? 'Depósito via agente',
                'status'           => 'completed',
            ]);

            // Lançamento contabilístico (crédito na carteira do utilizador)
            TransactionEntry::create([
                'transaction_id' => $transaction->id,
                'wallet_id'      => $wallet->id,
                'amount'         => $netAmount,
                'entry_type'     => 'credit',
            ]);

            return $transaction;
        });

        } catch (\Exception $e) {
            $status = $e->getCode() ?: 400;
            if ($status < 400 || $status > 500) $status = 400;
            
            return response()->json([
                'message' => $e->getMessage(),
            ], $status);
        }

        // Notificar utilizador sobre o depósito recebido
        \App\Helpers\ExpoPushHelper::notifyUser(
            $targetUser,
            'Depósito Recebido!',
            "O agente {$agent->first_name} acabou de depositar {$netAmount} AOA na sua conta.",
            ['type' => 'deposit', 'transaction_id' => $transaction->id]
        );

        return response()->json([
            'message'     => 'Depósito realizado com sucesso.',
            'transaction' => $transaction->load([
                'sender:id,first_name,last_name',
                'receiver:id,first_name,last_name',
            ]),
            'new_balance' => \App\Models\Wallet::where('user_id', $targetUser->id)->value('balance'),
        ], 201);
    }
}
