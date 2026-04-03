<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo de Carteira.
 *
 * Cada utilizador tem uma carteira com saldo e moeda.
 * A carteira é criada automaticamente no registo do utilizador.
 */
class Wallet extends Model
{
    use HasFactory;

    /**
     * Campos permitidos para atribuição em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'balance',
        'currency',
    ];

    /**
     * Conversões de tipo automáticas.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'balance' => 'decimal:2',
    ];

    // ──────────────────────────────────────────────
    //  RELAÇÕES
    // ──────────────────────────────────────────────

    /**
     * O dono da carteira (1:1 inverso).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Lançamentos contabilísticos desta carteira.
     */
    public function transactionEntries()
    {
        return $this->hasMany(TransactionEntry::class);
    }
}
