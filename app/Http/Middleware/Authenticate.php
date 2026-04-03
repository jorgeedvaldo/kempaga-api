<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

/**
 * Middleware de autenticação.
 *
 * Para uma API pura, nunca redireciona — retorna sempre
 * uma resposta JSON 401 quando não autenticado.
 */
class Authenticate extends Middleware
{
    /**
     * Redireccionar quando não autenticado.
     *
     * Retorna null para APIs, forçando uma resposta JSON 401
     * em vez de redirecionar para uma página de login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // API pura: nunca redirecionar, sempre retornar 401 JSON
        return null;
    }
}
