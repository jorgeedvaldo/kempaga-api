<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

/**
 * Handler de exceções da aplicação.
 *
 * Configurado para retornar respostas JSON consistentes
 * para todos os erros da API.
 */
class Handler extends ExceptionHandler
{
    /**
     * Tipos de exceção com níveis de log personalizados.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * Exceções que não são reportadas.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * Campos que nunca são guardados na sessão em caso de exceção de validação.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Registar callbacks de handling de exceções.
     *
     * @return void
     */
    public function register()
    {
        // Formato JSON consistente para erros 404
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json([
                    'message' => 'Recurso não encontrado.',
                ], 404);
            }
        });

        // Formato JSON consistente para erros de autenticação
        $this->renderable(function (AuthenticationException $e, $request) {
            if ($request->is('api/*') || $request->expectsJson()) {
                return response()->json([
                    'message' => 'Não autenticado.',
                ], 401);
            }
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
