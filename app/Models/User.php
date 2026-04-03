<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Modelo de Utilizador.
 *
 * Representa um utilizador da aplicação "Quem Paga".
 * Suporta autenticação via Sanctum (token).
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Campos permitidos para atribuição em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'type',
        'status',
        'bi_number',
        'image_url',
    ];

    /**
     * Campos ocultos na serialização (JSON).
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversões de tipo automáticas.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Campos adicionais no JSON.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'full_name',
    ];

    // ──────────────────────────────────────────────
    //  ACCESSORS
    // ──────────────────────────────────────────────

    /**
     * Accessor: nome completo do utilizador.
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    // ──────────────────────────────────────────────
    //  RELAÇÕES
    // ──────────────────────────────────────────────

    /**
     * A carteira do utilizador (1:1).
     */
    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    /**
     * Todas as transações do utilizador.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Transações enviadas pelo utilizador.
     */
    public function sentTransactions()
    {
        return $this->hasMany(Transaction::class, 'sender_id');
    }

    /**
     * Transações recebidas pelo utilizador.
     */
    public function receivedTransactions()
    {
        return $this->hasMany(Transaction::class, 'receiver_id');
    }

    /**
     * Pedidos de dinheiro enviados pelo utilizador.
     */
    public function sentMoneyRequests()
    {
        return $this->hasMany(MoneyRequest::class, 'sender_id');
    }

    /**
     * Pedidos de dinheiro recebidos pelo utilizador.
     */
    public function receivedMoneyRequests()
    {
        return $this->hasMany(MoneyRequest::class, 'receiver_id');
    }
}
