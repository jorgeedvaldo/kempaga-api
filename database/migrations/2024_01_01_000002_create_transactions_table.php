<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migração da tabela de transações.
 *
 * Regista todas as operações financeiras:
 * - trx_id: identificador único legível (TRX-XXXXXXXX)
 * - type: direção (send/receive/deposit/withdraw)
 * - transaction_type: categoria (transfer/payment/deposit/withdrawal/request)
 * - Suporta transações P2P (sender_id/receiver_id) e avulsas
 */
return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            // Identificador único legível
            $table->string('trx_id')->unique();

            // Utilizador dono desta entrada de transação
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Direção da transação
            $table->enum('type', ['send', 'receive', 'deposit', 'withdraw']);

            // Categoria da transação
            $table->enum('transaction_type', [
                'transfer',
                'payment',
                'deposit',
                'withdrawal',
                'request',
            ]);

            // Valores financeiros
            $table->decimal('amount', 16, 2);           // Montante bruto
            $table->decimal('charge', 16, 2)->default(0); // Taxa cobrada
            $table->decimal('net_amount', 16, 2);        // Montante líquido (amount - charge)
            $table->decimal('balance_after', 16, 2);     // Saldo após a transação

            // Participantes (nullable para depósitos/levantamentos)
            $table->foreignId('sender_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('set null');

            $table->foreignId('receiver_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('set null');

            // Detalhes adicionais
            $table->text('note')->nullable();
            $table->enum('status', ['pending', 'completed', 'failed', 'cancelled'])
                  ->default('pending');

            $table->timestamps();

            // Índices para consultas frequentes
            $table->index('user_id');
            $table->index('sender_id');
            $table->index('receiver_id');
            $table->index('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
