<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Controlador de Carteira.
 *
 * Permite consultar o saldo e o histórico de transações da carteira.
 */
class WalletController extends Controller
{
    /**
     * Mostrar a carteira do utilizador autenticado.
     *
     * Retorna o saldo atual, moeda e dados do utilizador.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $wallet = $request->user()->wallet;

        if (!$wallet) {
            return response()->json([
                'message' => 'Carteira não encontrada.',
            ], 404);
        }

        return response()->json([
            'wallet' => $wallet,
        ]);
    }

    /**
     * Listar as transações da carteira do utilizador.
     *
     * Retorna transações paginadas (20 por página) ordenadas
     * por data mais recente primeiro.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function transactions(Request $request): JsonResponse
    {
        $transactions = Transaction::where('user_id', $request->user()->id)
            ->with(['sender:id,first_name,last_name,image_url', 'receiver:id,first_name,last_name,image_url'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return response()->json($transactions);
    }
}
