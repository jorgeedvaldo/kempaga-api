<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Listar as notificações do utilizador (paginadas).
     */
    public function index(Request $request): JsonResponse
    {
        $notifications = $request->user()->notifications()->paginate(20);

        return response()->json($notifications);
    }

    /**
     * Marcar uma notificação específica como lida.
     */
    public function read(Request $request, string $id): JsonResponse
    {
        $notification = $request->user()->notifications()->where('id', $id)->first();

        if (!$notification) {
            return response()->json(['message' => 'Notificação não encontrada.'], 404);
        }

        $notification->markAsRead();

        return response()->json([
            'message' => 'Notificação marcada como lida.',
            'notification' => $notification
        ]);
    }

    /**
     * Marcar todas as notificações do utilizador como lidas.
     */
    public function readAll(Request $request): JsonResponse
    {
        $request->user()->unreadNotifications->markAsRead();

        return response()->json([
            'message' => 'Todas as notificações foram marcadas como lidas.'
        ]);
    }
}
