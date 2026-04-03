<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migração da tabela de pedidos de dinheiro.
 *
 * Permite que um utilizador peça dinheiro a outro.
 * O recetor (receiver) pode aceitar, rejeitar ou o remetente pode cancelar.
 */
return new class extends Migration
{
    public function up()
    {
        Schema::create('money_requests', function (Blueprint $table) {
            $table->id();

            // Quem fez o pedido
            $table->foreignId('sender_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // A quem foi pedido
            $table->foreignId('receiver_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->decimal('amount', 16, 2);           // Montante pedido
            $table->text('note')->nullable();             // Nota/razão do pedido

            $table->enum('status', ['pending', 'accepted', 'rejected', 'cancelled'])
                  ->default('pending');

            $table->timestamps();

            // Índices
            $table->index('sender_id');
            $table->index('receiver_id');
            $table->index('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('money_requests');
    }
};
