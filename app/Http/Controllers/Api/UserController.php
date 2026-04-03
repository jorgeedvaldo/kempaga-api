<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Controlador de Utilizadores.
 *
 * Gere a consulta e atualização de perfis,
 * pesquisa de utilizadores e upload de foto.
 */
class UserController extends Controller
{
    /**
     * Pesquisar utilizadores por telefone ou email.
     *
     * Permite encontrar utilizadores para enviar dinheiro
     * ou fazer pedidos. Retorna apenas dados públicos.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function search(Request $request): JsonResponse
    {
        $request->validate([
            'query' => ['required', 'string', 'min:3'],
        ]);

        $query = $request->query('query');
        $currentUserId = $request->user()->id;

        $users = User::where('id', '!=', $currentUserId)
            ->where('status', 'active')
            ->where(function ($q) use ($query) {
                $q->where('phone', $query)
                  ->orWhere('email', $query)
                  ->orWhere('first_name', 'like', "%{$query}%")
                  ->orWhere('last_name', 'like', "%{$query}%");
            })
            ->select('id', 'first_name', 'last_name', 'email', 'phone', 'image_url')
            ->limit(20)
            ->get();

        // Ofuscar contactos se a pesquisa for apenas por nome e não exata
        $users->transform(function ($user) use ($query) {
            if ($user->phone !== $query && $user->email !== $query) {
                $user->phone = mb_substr($user->phone, 0, 5) . '****' . mb_substr($user->phone, -2);
                
                $parts = explode('@', $user->email);
                if (count($parts) === 2) {
                    $user->email = mb_substr($parts[0], 0, 2) . '***@' . $parts[1];
                }
            }
            return $user;
        });

        return response()->json([
            'users' => $users,
        ]);
    }

    /**
     * Mostrar perfil público de um utilizador.
     *
     * Retorna apenas dados públicos (sem password, BI).
     *
     * @param  User  $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        return response()->json([
            'user' => $user->only([
                'id', 'first_name', 'last_name', 'email',
                'phone', 'type', 'image_url', 'full_name',
            ]),
        ]);
    }

    /**
     * Atualizar perfil do utilizador autenticado.
     *
     * Permite alterar nome, telefone, BI e foto.
     *
     * @param  UpdateProfileRequest  $request
     * @return JsonResponse
     */
    public function update(UpdateProfileRequest $request): JsonResponse
    {
        $user = $request->user();
        $data = $request->validated();

        // Upload de nova foto (se fornecida)
        if ($request->hasFile('image')) {
            // Apagar foto anterior (se existir)
            if ($user->image_url) {
                $oldPath = str_replace('/storage/', '', $user->image_url);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('image')->store('avatars', 'public');
            $data['image_url'] = Storage::url($path);
        }

        // Remover o campo 'image' do array (o campo no BD é 'image_url')
        unset($data['image']);

        $user->update($data);

        return response()->json([
            'message' => 'Perfil atualizado com sucesso.',
            'user'    => $user->fresh()->load('wallet'),
        ]);
    }

    /**
     * Upload de foto de perfil (endpoint dedicado).
     *
     * Para facilitar o upload separado da foto na app móvel.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function uploadImage(Request $request): JsonResponse
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:5120'],
        ]);

        $user = $request->user();

        // Apagar foto anterior
        if ($user->image_url) {
            $oldPath = str_replace('/storage/', '', $user->image_url);
            Storage::disk('public')->delete($oldPath);
        }

        // Guardar nova foto
        $path = $request->file('image')->store('avatars', 'public');
        $user->update(['image_url' => Storage::url($path)]);

        return response()->json([
            'message'   => 'Foto atualizada com sucesso.',
            'image_url' => $user->image_url,
        ]);
    }
    /**
     * Atualizar o token de dispositivo para Push Notifications (Expo).
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function updateDeviceToken(Request $request): JsonResponse
    {
        $request->validate([
            'token' => ['required', 'string'],
        ]);

        $request->user()->update([
            'device_token' => $request->token,
        ]);

        return response()->json([
            'message' => 'Device token atualizado com sucesso.',
        ]);
    }
}
