<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use App\Models\Transaction;

/**
 * Helper para operações relacionadas com transações.
 *
 * Centraliza a geração de IDs únicos e cálculo de taxas.
 */
class TransactionHelper
{
    /**
     * Gerar um ID de transação único.
     *
     * Formato: TRX-XXXXXXXX (8 caracteres alfanuméricos maiúsculos).
     * Verifica unicidade na base de dados antes de retornar.
     *
     * @return string
     */
    public static function generateTrxId(): string
    {
        do {
            $trxId = 'TRX-' . strtoupper(Str::random(8));
        } while (Transaction::where('trx_id', $trxId)->exists());

        return $trxId;
    }

    /**
     * Calcular a taxa de uma transação.
     *
     * Por enquanto, retorna 0 (sem taxas).
     * Pode ser expandido no futuro para cobrar percentagens
     * ou valores fixos por tipo de transação.
     *
     * @param  float  $amount           Montante da transação
     * @param  string $transactionType  Tipo de transação
     * @return float
     */
    public static function calculateCharge(float $amount, string $transactionType): float
    {
        // TODO: Implementar lógica de taxas conforme necessário
        // Exemplo futuro:
        // if ($transactionType === 'withdrawal') return $amount * 0.01;

        return 0.00;
    }
}
