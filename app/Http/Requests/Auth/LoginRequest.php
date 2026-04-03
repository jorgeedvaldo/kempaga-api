<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Validação do pedido de login.
 */
class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Endpoint público
    }

    /**
     * Regras de validação.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email'    => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Mensagens de erro personalizadas.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required'    => 'O email é obrigatório.',
            'password.required' => 'A password é obrigatória.',
        ];
    }
}
