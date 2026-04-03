<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MoneyRequest\StoreMoneyRequestRequest;
use App\Http\Requests\MoneyRequest\UpdateMoneyRequestRequest;
use App\Helpers\TransactionHelper;
use App\Models\MoneyRequest;
use App\Models\Transaction;
use App\Models\TransactionEntry;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * Controlador de Pedidos de Dinheiro.
 *
 * Gere o ciclo de vida dos pedidos de dinheiro:
 * criar → aceitar/rejeitar → (gera transferência se aceite).
 */
class MoneyRequestController extends Controller
{
    /**
     * Listar pedidos de dinheiro do utilizador.
     *
     * Inclui pedidos enviados e recebidos, com filtro opcional por estado.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $userId = $request->user()->id;

        $query = MoneyRequest::where('sender_id', $userId)
            ->orWhere('receiver_id', $userId);

        // Filtro opcional por tipo (sent/received)
        if ($request->has('filter')) {
            if ($request->filter === 'sent') {
                $query = MoneyRequest::where('sender_id', $userId);
            } elseif ($request->filter === 'received') {
                $query = MoneyRequest::where('receiver_id', $userId);
            }
        }

        // Filtro opcional por estado
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $moneyRequests = $query
            ->with([
                'sender:id,first_name,last_name,image_url',
                'receiver:id,first_name,last_name,image_url',
            ])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->json($moneyRequests);
    }

    /**
     * Criar um novo pedido de dinheiro.
     *
     * O utilizador autenticado (sender) pede dinheiro ao receiver.
     *
     * @param  StoreMoneyRequestRequest  $request
     * @return JsonResponse
     */
    public function store(StoreMoneyRequestRequest $request): JsonResponse
    {
        $sender = $request->user();
        $data = $request->validated();

        // Não permitir pedir a si próprio
        if ($sender->id == $data['receiver_id']) {
            return response()->json([
                'message' => 'Não pode pedir dinheiro a si próprio.',
            ], 422);
        }

        $moneyRequest = MoneyRequest::create([
            'sender_id' => $sender->id,
            'receiver_id' => $data['receiver_id'],
            'amount' => $data['amount'],
            'note' => $data['note'] ?? null,
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Pedido de dinheiro criado com sucesso.',
            'money_request' => $moneyRequest->load([
                'sender:id,first_name,last_name',
                'receiver:id,first_name,last_name',
            ]),
        ], 201);
    }

    /**
     * Atualizar o estado de um pedido de dinheiro (aceitar/rejeitar).
     *
     * Apenas o receiver pode aceitar ou rejeitar.
     * Se aceite, processa a transferência automaticamente.
     *
     * @param  UpdateMoneyRequestRequest  $request
     * @param  MoneyRequest  $moneyRequest
     * @return JsonResponse
     */
    public function update(UpdateMoneyRequestRequest $request, MoneyRequest $moneyRequest): JsonResponse
    {
        $user = $request->user();
        $data = $request->validated();

        // Apenas o receiver pode aceitar/rejeitar
        if ($moneyRequest->receiver_id !== $user->id) {
            return response()->json([
                'message' => 'Não tem permissão para alterar este pedido.',
            ], 403);
        }

        // Verificar se o pedido ainda está pendente
        if ($moneyRequest->status !== 'pending') {
            return response()->json([
                'message' => 'Este pedido já foi processado.',
            ], 422);
        }

        // Se rejeitar, apenas atualizar o estado
        if ($data['status'] === 'rejected') {
            $moneyRequest->update(['status' => 'rejected']);

            return response()->json([
                'message' => 'Pedido rejeitado.',
                'money_request' => $moneyRequest,
            ]);
        }

        // Aceitar → processar transferência

        $amount = (float) $moneyRequest->amount;
        $charge = TransactionHelper::calculateCharge($amount, 'request');
        $netAmount = $amount - $charge;

        try {
            // Processar transferência com lockForUpdate
            DB::transaction(function () use ($moneyRequest, $user, $amount, $charge, $netAmount) {

                // Bloquear pedido para evitar concorrência dupla-aceitação
                $lockedRequest = \App\Models\MoneyRequest::where('id', $moneyRequest->id)->lockForUpdate()->first();
                
                if ($lockedRequest->status !== 'pending') {
                    throw new \Exception('Este pedido já foi processado ou alterado.', 422);
                }

                $receiverWallet = \App\Models\Wallet::where('user_id', $user->id)->lockForUpdate()->first();
                $senderWallet = \App\Models\Wallet::where('user_id', $moneyRequest->sender_id)->lockForUpdate()->first();

                if (!$receiverWallet || !$senderWallet) {
                    throw new \Exception('Carteira não encontrada.', 404);
                }

                // Verificar saldo
                if ($receiverWallet->balance < $amount) {
                    throw new \Exception('Saldo insuficiente.', 422);
                }

                // Debitar Kempaga (receiver do pedido)
                $receiverWallet->balance -= $amount;
                $receiverWallet->save();

            // Creditar quem pediu (sender do pedido)
            $senderWallet->balance += $netAmount;
            $senderWallet->save();

            // Transação de envio (para Kempaga)
            $payerTransaction = Transaction::create([
                'trx_id' => TransactionHelper::generateTrxId(),
                'user_id' => $user->id,
                'type' => 'send',
                'transaction_type' => 'request',
                'amount' => $amount,
                'charge' => $charge,
                'net_amount' => $netAmount,
                'balance_after' => $receiverWallet->balance,
                'sender_id' => $user->id,
                'receiver_id' => $moneyRequest->sender_id,
                'note' => $moneyRequest->note,
                'status' => 'completed',
            ]);

            // Transação de receção (para quem pediu)
            $requesterTransaction = Transaction::create([
                'trx_id' => TransactionHelper::generateTrxId(),
                'user_id' => $moneyRequest->sender_id,
                'type' => 'receive',
                'transaction_type' => 'request',
                'amount' => $netAmount,
                'charge' => 0,
                'net_amount' => $netAmount,
                'balance_after' => $senderWallet->balance,
                'sender_id' => $user->id,
                'receiver_id' => $moneyRequest->sender_id,
                'note' => $moneyRequest->note,
                'status' => 'completed',
            ]);

            // Lançamentos contabilísticos
            TransactionEntry::create([
                'transaction_id' => $payerTransaction->id,
                'wallet_id' => $receiverWallet->id,
                'amount' => $amount,
                'entry_type' => 'debit',
            ]);

            TransactionEntry::create([
                'transaction_id' => $requesterTransaction->id,
                'wallet_id' => $senderWallet->id,
                'amount' => $netAmount,
                'entry_type' => 'credit',
            ]);

            // Atualizar estado do pedido
            $lockedRequest->update(['status' => 'accepted']);
        });

        } catch (\Exception $e) {
            $status = $e->getCode() ?: 400;
            if ($status < 400 || $status > 500) $status = 400;
            
            return response()->json([
                'message' => $e->getMessage(),
            ], $status);
        }

        return response()->json([
            'message' => 'Pedido aceite e transferência processada.',
            'money_request' => $moneyRequest->fresh()->load([
                'sender:id,first_name,last_name',
                'receiver:id,first_name,last_name',
            ]),
        ]);
    }

    /**
     * Cancelar um pedido de dinheiro.
     *
     * Apenas o sender (quem fez o pedido) pode cancelar.
     *
     * @param  Request  $request
     * @param  MoneyRequest  $moneyRequest
     * @return JsonResponse
     */
    public function destroy(Request $request, MoneyRequest $moneyRequest): JsonResponse
    {
        // Apenas o sender pode cancelar
        if ($moneyRequest->sender_id !== $request->user()->id) {
            return response()->json([
                'message' => 'Não tem permissão para cancelar este pedido.',
            ], 403);
        }

        // Verificar se ainda está pendente
        if ($moneyRequest->status !== 'pending') {
            return response()->json([
                'message' => 'Este pedido já foi processado.',
            ], 422);
        }

        $moneyRequest->update(['status' => 'cancelled']);

        return response()->json([
            'message' => 'Pedido cancelado com sucesso.',
        ]);
    }
}
