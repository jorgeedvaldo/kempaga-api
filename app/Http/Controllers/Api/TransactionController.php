<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\StoreTransactionRequest;
use App\Helpers\TransactionHelper;
use App\Models\Transaction;
use App\Models\TransactionEntry;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Controlador de Transações.
 *
 * Gere a criação e consulta de transações financeiras.
 * As transferências P2P são processadas com partidas dobradas:
 * - Débito na carteira do remetente
 * - Crédito na carteira do destinatário
 */
class TransactionController extends Controller
{
    /**
     * Listar transações do utilizador autenticado.
     *
     * Suporta filtros opcionais: type, status, transaction_type.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $query = Transaction::where('user_id', $request->user()->id)
            ->with(['sender:id,first_name,last_name,image_url', 'receiver:id,first_name,last_name,image_url']);

        // Filtros opcionais
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        if ($request->has('transaction_type')) {
            $query->where('transaction_type', $request->transaction_type);
        }

        $transactions = $query->orderBy('created_at', 'desc')->paginate(20);

        return response()->json($transactions);
    }

    /**
     * Criar uma transferência P2P (enviar dinheiro).
     *
     * Processo:
     * 1. Verificar PIN do remetente
     * 2. Verificar saldo suficiente
     * 3. Dentro de uma transação DB:
     *    - Debitar carteira do remetente
     *    - Creditar carteira do destinatário
     *    - Criar registos de transação para ambos
     *    - Criar lançamentos contabilísticos
     *
     * @param  StoreTransactionRequest  $request
     * @return JsonResponse
     */
    public function store(StoreTransactionRequest $request): JsonResponse
    {
        $sender = $request->user();
        $data = $request->validated();

        // 1. Verificar PIN
        if (!Hash::check($data['pin'], $sender->pin)) {
            return response()->json([
                'message' => 'PIN inválido.',
            ], 422);
        }

        // 2. Não permitir envio para si próprio
        if ($sender->id == $data['receiver_id']) {
            return response()->json([
                'message' => 'Não pode enviar dinheiro para si próprio.',
            ], 422);
        }

        // 3. Verificar destinatário
        $receiver = User::findOrFail($data['receiver_id']);
        $senderWallet = $sender->wallet;
        $receiverWallet = $receiver->wallet;

        if (!$senderWallet || !$receiverWallet) {
            return response()->json([
                'message' => 'Carteira não encontrada.',
            ], 404);
        }

        $amount = (float) $data['amount'];
        $charge = TransactionHelper::calculateCharge($amount, 'transfer');
        $netAmount = $amount - $charge;

        // 4. Verificar saldo suficiente
        if ($senderWallet->balance < $amount) {
            return response()->json([
                'message' => 'Saldo insuficiente.',
                'balance' => $senderWallet->balance,
            ], 422);
        }

        // 5. Processar a transferência dentro de uma transação DB
        $result = DB::transaction(function () use ($sender, $receiver, $senderWallet, $receiverWallet, $amount, $charge, $netAmount, $data) {

            // Debitar remetente
            $senderWallet->balance -= $amount;
            $senderWallet->save();

            // Creditar destinatário
            $receiverWallet->balance += $netAmount;
            $receiverWallet->save();

            // Gerar IDs únicos
            $senderTrxId = TransactionHelper::generateTrxId();
            $receiverTrxId = TransactionHelper::generateTrxId();

            // Registo de transação do remetente (envio)
            $senderTransaction = Transaction::create([
                'trx_id'           => $senderTrxId,
                'user_id'          => $sender->id,
                'type'             => 'send',
                'transaction_type' => 'transfer',
                'amount'           => $amount,
                'charge'           => $charge,
                'net_amount'       => $netAmount,
                'balance_after'    => $senderWallet->balance,
                'sender_id'        => $sender->id,
                'receiver_id'      => $receiver->id,
                'note'             => $data['note'] ?? null,
                'status'           => 'completed',
            ]);

            // Registo de transação do destinatário (receção)
            $receiverTransaction = Transaction::create([
                'trx_id'           => $receiverTrxId,
                'user_id'          => $receiver->id,
                'type'             => 'receive',
                'transaction_type' => 'transfer',
                'amount'           => $netAmount,
                'charge'           => 0,
                'net_amount'       => $netAmount,
                'balance_after'    => $receiverWallet->balance,
                'sender_id'        => $sender->id,
                'receiver_id'      => $receiver->id,
                'note'             => $data['note'] ?? null,
                'status'           => 'completed',
            ]);

            // Lançamentos contabilísticos (partidas dobradas)
            TransactionEntry::create([
                'transaction_id' => $senderTransaction->id,
                'wallet_id'      => $senderWallet->id,
                'amount'         => $amount,
                'entry_type'     => 'debit',
            ]);

            TransactionEntry::create([
                'transaction_id' => $receiverTransaction->id,
                'wallet_id'      => $receiverWallet->id,
                'amount'         => $netAmount,
                'entry_type'     => 'credit',
            ]);

            return $senderTransaction;
        });

        return response()->json([
            'message'     => 'Transferência realizada com sucesso.',
            'transaction' => $result->load(['sender:id,first_name,last_name', 'receiver:id,first_name,last_name']),
        ], 201);
    }

    /**
     * Mostrar detalhes de uma transação.
     *
     * Apenas o dono da transação pode consultá-la.
     *
     * @param  Request  $request
     * @param  Transaction  $transaction
     * @return JsonResponse
     */
    public function show(Request $request, Transaction $transaction): JsonResponse
    {
        // Garantir que a transação pertence ao utilizador autenticado
        if ($transaction->user_id !== $request->user()->id) {
            return response()->json([
                'message' => 'Transação não encontrada.',
            ], 404);
        }

        return response()->json([
            'transaction' => $transaction->load([
                'sender:id,first_name,last_name,image_url',
                'receiver:id,first_name,last_name,image_url',
                'entries.wallet',
            ]),
        ]);
    }
}
