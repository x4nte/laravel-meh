<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'unique:users,email'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Введите новый email.',
            'email.email' => 'Некорректный формат email.',
            'email.unique' => 'Такой email уже используется.',
        ];
    }
}
