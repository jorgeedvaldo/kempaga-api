<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Middleware de autorização por papel (role).
 *
 * Garante que apenas utilizadores com tipo 'agent' ou 'admin'
 * podem aceder a rotas protegidas por este middleware.
 * Retorna 403 Forbidden caso contrário.
 */
class EnsureUserIsAgentOrAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (!$user || !in_array($user->type, ['agent', 'admin'])) {
            return response()->json([
                'message' => 'Acesso negado. Apenas agentes e administradores podem aceder a este recurso.',
            ], 403);
        }

        return $next($request);
    }
}
