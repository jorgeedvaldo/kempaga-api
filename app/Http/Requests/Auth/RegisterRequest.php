<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Validação do pedido de registo.
 *
 * Valida todos os campos necessários para criar uma nova conta,
 * incluindo upload de foto e número do BI.
 */
class RegisterRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:100'],
            'last_name'  => ['required', 'string', 'max:100'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone'      => ['required', 'string', 'max:20', 'unique:users,phone'],
            'password'   => ['required', 'string', 'min:6', 'confirmed'],
            'pin'        => ['required', 'string', 'digits_between:4,6'],
            'bi_number'  => ['required', 'string', 'max:50', 'unique:users,bi_number'],
            'type'       => ['sometimes', 'in:personal,merchant'],
            'image'      => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:5120'], // Máx 5MB
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
            'email.unique'     => 'Este email já está registado.',
            'phone.unique'     => 'Este número de telefone já está registado.',
            'bi_number.unique' => 'Este número de BI já está registado.',
            'pin.digits_between' => 'O PIN deve ter entre 4 e 6 dígitos.',
            'password.confirmed' => 'A confirmação da password não coincide.',
            'image.max'        => 'A imagem não pode exceder 5MB.',
        ];
    }
}
