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

        // 1. Verificar utilizador destinatário e sua carteira
        $targetUser = User::findOrFail($data['user_id']);
        $wallet = $targetUser->wallet;

        if (!$wallet) {
            return response()->json([
                'message' => 'Carteira do utilizador não encontrada.',
            ], 404);
        }

        $amount = (float) $data['amount'];
        $charge = TransactionHelper::calculateCharge($amount, 'deposit');
        $netAmount = $amount - $charge;

        // 2. Processar o depósito dentro de uma transação DB
        $transaction = DB::transaction(function () use ($agent, $targetUser, $wallet, $amount, $charge, $netAmount, $data) {

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

        return response()->json([
            'message'     => 'Depósito realizado com sucesso.',
            'transaction' => $transaction->load([
                'sender:id,first_name,last_name',
                'receiver:id,first_name,last_name',
            ]),
            'new_balance' => $wallet->balance,
        ], 201);
    }
}
