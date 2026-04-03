<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Validação do pedido de transferência P2P.
 *
 * Valida que o destinatário existe, o montante é positivo,
 * e o PIN é fornecido para autorização.
 */
class StoreTransactionRequest extends FormRequest
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
            'receiver_id' => ['required', 'integer', 'exists:users,id'],
            'amount'      => ['required', 'numeric', 'min:1'],
            'note'        => ['nullable', 'string', 'max:500'],
            'pin'         => ['required', 'string', 'digits_between:4,6'],
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
            'receiver_id.required' => 'O destinatário é obrigatório.',
            'receiver_id.exists'   => 'O destinatário não existe.',
            'amount.required'      => 'O montante é obrigatório.',
            'amount.min'           => 'O montante mínimo é 1 AOA.',
            'pin.required'         => 'O PIN é obrigatório para transferências.',
        ];
    }
}
