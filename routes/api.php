<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DepositController;
use App\Http\Controllers\Api\MoneyRequestController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WalletController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas da API — Kempaga
|--------------------------------------------------------------------------
|
| Todas as rotas são prefixadas com /api automaticamente.
|
| Rotas públicas:
|   POST /auth/register  — Registar conta
|   POST /auth/login     — Iniciar sessão
|
| Rotas protegidas (requer token Sanctum):
|   Autenticação, Carteira, Transações, Pedidos, Utilizadores
|
| Rotas de agente/admin (requer token + tipo agent/admin):
|   POST /deposits — Registar depósito na carteira de um utilizador
|
*/

// ──────────────────────────────────────────────────
//  ROTAS PÚBLICAS (sem autenticação)
// ──────────────────────────────────────────────────

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

// ──────────────────────────────────────────────────
//  ROTAS PROTEGIDAS (requer auth:sanctum)
// ──────────────────────────────────────────────────

Route::middleware('auth:sanctum')->group(function () {

    // --- Autenticação ---
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/user', [AuthController::class, 'user']);
    });

    // --- Carteira ---
    Route::prefix('wallet')->group(function () {
        Route::get('/', [WalletController::class, 'show']);
        Route::get('/transactions', [WalletController::class, 'transactions']);
    });

    // --- Transações ---
    Route::prefix('transactions')->group(function () {
        Route::get('/', [TransactionController::class, 'index']);
        Route::post('/', [TransactionController::class, 'store']);
        Route::get('/{transaction}', [TransactionController::class, 'show']);
    });

    // --- Pedidos de Dinheiro ---
    Route::prefix('money-requests')->group(function () {
        Route::get('/', [MoneyRequestController::class, 'index']);
        Route::post('/', [MoneyRequestController::class, 'store']);
        Route::put('/{moneyRequest}', [MoneyRequestController::class, 'update']);
        Route::delete('/{moneyRequest}', [MoneyRequestController::class, 'destroy']);
    });

    // --- Utilizadores ---
    Route::prefix('users')->group(function () {
        Route::get('/search', [UserController::class, 'search']);
        Route::put('/profile', [UserController::class, 'update']);
        Route::post('/profile/image', [UserController::class, 'uploadImage']);
        Route::get('/{user}', [UserController::class, 'show']);
    });

    // ──────────────────────────────────────────────────
    //  ROTAS DE AGENTE / ADMIN
    // ──────────────────────────────────────────────────

    Route::middleware('role.agent_or_admin')->group(function () {
        // --- Depósitos (entrada de dinheiro real) ---
        Route::get('/deposits', [DepositController::class, 'index']);  // Listar depósitos do agente
        Route::post('/deposits', [DepositController::class, 'store']); // Registar novo depósito
    });
});
