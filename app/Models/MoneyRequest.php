<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo de Pedido de Dinheiro.
 *
 * Permite que um utilizador peça dinheiro a outro.
 * O ciclo de vida é: pending → accepted/rejected/cancelled.
 */
class MoneyRequest extends Model
{
    use HasFactory;

    /**
     * Nome da tabela (definido explicitamente para clareza).
     *
     * @var string
     */
    protected $table = 'money_requests';

    /**
     * Campos permitidos para atribuição em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'amount',
        'note',
        'status',
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
     * Quem fez o pedido de dinheiro.
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * A quem foi pedido o dinheiro.
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
