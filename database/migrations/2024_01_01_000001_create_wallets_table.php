<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migração da tabela de carteiras.
 *
 * Cada utilizador tem uma carteira com saldo e moeda.
 * O saldo é armazenado com 2 casas decimais (máx 16 dígitos).
 */
return new class extends Migration
{
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->decimal('balance', 16, 2)->default(0.00);  // Saldo atual
            $table->string('currency', 3)->default('AOA');       // Moeda (Kwanza Angolano)

            $table->timestamps();

            // Índice para consultas rápidas por utilizador
            $table->unique('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wallets');
    }
};
