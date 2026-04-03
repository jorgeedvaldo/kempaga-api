<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo de Transação.
 *
 * Regista todas as operações financeiras (transferências, depósitos,
 * levantamentos, pagamentos). Cada transação gera lançamentos
 * contabilísticos nas carteiras envolvidas.
 */
class Transaction extends Model
{
    use HasFactory;

    /**
     * Campos permitidos para atribuição em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'trx_id',
        'user_id',
        'type',
        'transaction_type',
        'amount',
        'charge',
        'net_amount',
        'balance_after',
        'sender_id',
        'receiver_id',
        'note',
        'status',
    ];

    /**
     * Conversões de tipo automáticas.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount'        => 'decimal:2',
        'charge'        => 'decimal:2',
        'net_amount'    => 'decimal:2',
        'balance_after' => 'decimal:2',
    ];

    // ──────────────────────────────────────────────
    //  RELAÇÕES
    // ──────────────────────────────────────────────

    /**
     * O utilizador dono desta entrada de transação.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * O remetente da transação.
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * O destinatário da transação.
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    /**
     * Lançamentos contabilísticos desta transação.
     */
    public function entries()
    {
        return $this->hasMany(TransactionEntry::class);
    }
}
