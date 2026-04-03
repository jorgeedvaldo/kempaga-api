<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migração da tabela de lançamentos contabilísticos.
 *
 * Cada transação gera lançamentos de débito/crédito nas carteiras envolvidas.
 * Isto permite manter um registo contabilístico completo (partidas dobradas).
 */
return new class extends Migration
{
    public function up()
    {
        Schema::create('transaction_entries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('transaction_id')
                  ->constrained('transactions')
                  ->onDelete('cascade');

            $table->foreignId('wallet_id')
                  ->constrained('wallets')
                  ->onDelete('cascade');

            $table->decimal('amount', 16, 2);           // Montante do lançamento
            $table->enum('entry_type', ['credit', 'debit']); // Tipo de lançamento

            $table->timestamps();

            // Índices
            $table->index('transaction_id');
            $table->index('wallet_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction_entries');
    }
};
