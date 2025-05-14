<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Ou adicionar lógica de permissão se necessário
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => [
                'required',
                'regex:/^[A-Za-z]+(?:\s[A-Za-z]+)+$/', // Exige pelo menos dois nomes
                'min:3'
            ],
        ];
    }

    /**
     * Custom error messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'full_name.regex' => 'O nome completo deve conter nome e sobrenome.',
            'full_name.required' => 'O nome completo é obrigatório.',
            'full_name.min' => 'O nome completo deve ter pelo menos 3 caracteres.',
        ];
    }
}
