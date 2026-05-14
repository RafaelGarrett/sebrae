<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $customerId = $this->route('customer') ? $this->route('customer')->id : null;

        return [
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:customers,email,$customerId",
            'telefone' => 'nullable|max:20',
            'cep' => 'nullable|max:8',
            'street' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:4',
            'neighborhood' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de email válido.',
            'email.unique' => 'O email já está em uso.',
            'telefone.max' => 'O campo telefone deve ter no máximo :max caracteres.',
            'cep.max' => 'O campo CEP deve ter no máximo :max caracteres.',
            'street.max' => 'O campo rua deve ter no máximo :max caracteres.',
            'number.max' => 'O campo número deve ter no máximo :max caracteres.',
            'neighborhood.max' => 'O campo bairro deve ter no máximo :max caracteres.',
            'city.max' => 'O campo cidade deve ter no máximo :max caracteres.',
            'state.max' => 'O campo estado deve ter no máximo :max caracteres.',
        ];
    }
}
