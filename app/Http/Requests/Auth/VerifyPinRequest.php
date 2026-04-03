<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Validação do pedido de verificação de PIN.
 *
 * Usado antes de operações financeiras sensíveis.
 */
class VerifyPinRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Regras de validação.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'pin' => ['required', 'string', 'digits_between:4,6'],
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
            'pin.required'       => 'O PIN é obrigatório.',
            'pin.digits_between' => 'O PIN deve ter entre 4 e 6 dígitos.',
        ];
    }
}
