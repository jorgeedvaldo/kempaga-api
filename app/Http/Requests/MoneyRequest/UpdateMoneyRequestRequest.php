<?php

namespace App\Http\Requests\MoneyRequest;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Validação da atualização de pedido de dinheiro (aceitar/rejeitar).
 */
class UpdateMoneyRequestRequest extends FormRequest
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
            'status' => ['required', 'in:accepted,rejected'],
            'note'   => ['nullable', 'string', 'max:500'],
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
            'status.required' => 'O estado é obrigatório.',
            'status.in'       => 'O estado deve ser "accepted" ou "rejected".',

        ];
    }
}
