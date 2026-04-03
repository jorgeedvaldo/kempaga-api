<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo de Lançamento Contabilístico.
 *
 * Implementa partidas dobradas: cada transação gera pelo menos
 * um débito e um crédito nas carteiras envolvidas.
 */
class TransactionEntry extends Model
{
    use HasFactory;

    /**
     * Nome da tabela.
     *
     * @var string
     */
    protected $table = 'transaction_entries';

    /**
     * Campos permitidos para atribuição em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transaction_id',
        'wallet_id',
        'amount',
        'entry_type',
    ];

    /**
     * Conversões de tipo automáticas.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'decimal:2',
    ];

    // ──────────────────────────────────────────────
    //  RELAÇÕES
    // ──────────────────────────────────────────────

    /**
     * A transação associada a este lançamento.
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    /**
     * A carteira associada a este lançamento.
     */
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
