<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\VerifyPinRequest;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * Controlador de Autenticação.
 *
 * Gere o registo, login, logout e verificação de PIN
 * usando Laravel Sanctum para tokens de API.
 */
class AuthController extends Controller
{
    /**
     * Registar um novo utilizador.
     *
     * Cria a conta, faz upload da foto (se fornecida),
     * cria a carteira automaticamente e retorna um token.
     *
     * @param  RegisterRequest  $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();

        // Upload da foto de perfil (se fornecida)
        $imageUrl = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('avatars', 'public');
            $imageUrl = Storage::url($path);
        }

        // Criar o utilizador com password e PIN em hash
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'phone'      => $data['phone'],
            'password'   => Hash::make($data['password']),
            'pin'        => Hash::make($data['pin']),
            'type'       => $data['type'] ?? 'personal',
            'bi_number'  => $data['bi_number'],
            'image_url'  => $imageUrl,
        ]);

        // Criar a carteira automaticamente (saldo inicial = 0)
        Wallet::create([
            'user_id'  => $user->id,
            'balance'  => 0,
            'currency' => 'AOA',
        ]);

        // Gerar token de autenticação Sanctum
        $token = $user->createToken('quem-paga-mobile')->plainTextToken;

        return response()->json([
            'message' => 'Conta criada com sucesso.',
            'user'    => $user->load('wallet'),
            'token'   => $token,
        ], 201);
    }

    /**
     * Autenticar um utilizador existente.
     *
     * Verifica credenciais, valida estado da conta e retorna token.
     *
     * @param  LoginRequest  $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        // Procurar utilizador pelo email
        $user = User::where('email', $data['email'])->first();

        // Validar credenciais
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'message' => 'Credenciais inválidas.',
            ], 401);
        }

        // Verificar se a conta está ativa
        if ($user->status !== 'active') {
            return response()->json([
                'message' => 'A sua conta está ' . $user->status . '.',
            ], 403);
        }

        // Gerar novo token
        $token = $user->createToken('quem-paga-mobile')->plainTextToken;

        return response()->json([
            'message' => 'Login efetuado com sucesso.',
            'user'    => $user->load('wallet'),
            'token'   => $token,
        ]);
    }

    /**
     * Terminar sessão (revogar token atual).
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        // Revogar o token usado neste pedido
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sessão terminada com sucesso.',
        ]);
    }

    /**
     * Obter dados do utilizador autenticado.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function user(Request $request): JsonResponse
    {
        return response()->json([
            'user' => $request->user()->load('wallet'),
        ]);
    }

    /**
     * Verificar o PIN do utilizador.
     *
     * Usado antes de operações financeiras sensíveis
     * para confirmar a identidade do utilizador.
     *
     * @param  VerifyPinRequest  $request
     * @return JsonResponse
     */
    public function verifyPin(VerifyPinRequest $request): JsonResponse
    {
        $user = $request->user();

        if (!Hash::check($request->pin, $user->pin)) {
            return response()->json([
                'message' => 'PIN inválido.',
                'valid'   => false,
            ], 422);
        }

        return response()->json([
            'message' => 'PIN verificado com sucesso.',
            'valid'   => true,
        ]);
    }
}
