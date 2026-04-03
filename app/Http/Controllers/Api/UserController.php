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
                $q->where('phone', 'like', "%{$query}%")
                  ->orWhere('email', 'like', "%{$query}%")
                  ->orWhere('first_name', 'like', "%{$query}%")
                  ->orWhere('last_name', 'like', "%{$query}%");
            })
            ->select('id', 'first_name', 'last_name', 'email', 'phone', 'image_url')
            ->limit(20)
            ->get();

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
}
