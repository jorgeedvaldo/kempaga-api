<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migração da tabela de utilizadores.
 *
 * Estrutura principal para o sistema "Quem Paga":
 * - Dados pessoais (nome, email, telefone, BI)
 * - Autenticação (password + PIN para operações sensíveis)
 * - Tipo de conta e estado
 * - Foto de perfil
 */
return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Dados pessoais
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();

            // Autenticação
            $table->string('password');              // Hash da password
            $table->string('pin');                   // Hash do PIN (4-6 dígitos)

            // Tipo e estado da conta
            $table->enum('type', ['personal', 'merchant'])->default('personal');
            $table->enum('status', ['active', 'inactive', 'blocked'])->default('active');

            // Documentação e imagem
            $table->string('bi_number')->unique();   // Número do Bilhete de Identidade
            $table->string('image_url')->nullable();  // URL/caminho da foto de perfil

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
