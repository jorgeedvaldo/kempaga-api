<?php

namespace App\Http\Requests\Deposit;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Validação do pedido de depósito.
 *
 * Valida que o agente fornece um utilizador destinatário válido,
 * um montante positivo e uma nota opcional.
 */
class StoreDepositRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Autorização tratada pelo middleware role:agent_or_admin
    }

    /**
     * Regras de validação.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'amount'  => ['required', 'numeric', 'min:1'],
            'note'    => ['nullable', 'string', 'max:500'],
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
            'user_id.required' => 'O ID do utilizador é obrigatório.',
            'user_id.exists'   => 'Utilizador não encontrado.',
            'amount.required'  => 'O montante é obrigatório.',
            'amount.min'       => 'O montante mínimo é 1 AOA.',
        ];
    }
}
