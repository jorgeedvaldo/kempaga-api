<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Validação da atualização de perfil do utilizador.
 */
class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Regras de validação.
     *
     * O telefone e BI permitem manter o valor atual (ignore do próprio utilizador).
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $userId = $this->user()->id;

        return [
            'first_name' => ['sometimes', 'string', 'max:100'],
            'last_name'  => ['sometimes', 'string', 'max:100'],
            'phone'      => ['sometimes', 'string', 'max:20', "unique:users,phone,{$userId}"],
            'bi_number'  => ['sometimes', 'string', 'max:50', "unique:users,bi_number,{$userId}"],
            'image'      => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:5120'],
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
            'phone.unique'     => 'Este número de telefone já está em uso.',
            'bi_number.unique' => 'Este número de BI já está em uso.',
            'image.max'        => 'A imagem não pode exceder 5MB.',
        ];
    }
}
