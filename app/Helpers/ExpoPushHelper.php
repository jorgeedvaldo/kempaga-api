<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Helper para envio de notificações Push utilizando o SDK/Serviço da Expo.
 */
class ExpoPushHelper
{
    /**
     * Enviar notificação push via API da Expo.
     *
     * Este método ignora silenciosamente se o utilizador não possuir
     * um token válido para Expo ou em caso de falha de timeout.
     *
     * @param string|null $token
     * @param string $title
     * @param string $body
     * @param array $data
     * @return void
     */
    public static function send(?string $token, string $title, string $body, array $data = [])
    {
        if (!$token || !str_starts_with($token, 'ExponentPushToken')) {
            return;
        }

        try {
            // Executando em HTTP com Timeout curto para não bloquear o servidor permanentemente
            Http::timeout(3)->post('https://exp.host/--/api/v2/push/send', [
                'to'    => $token,
                'title' => $title,
                'body'  => $body,
                'data'  => $data,
                'sound' => 'default',
            ]);
        } catch (\Exception $e) {
            Log::error('Erro ao enviar notificação Expo: ' . $e->getMessage());
        }
    }
}
