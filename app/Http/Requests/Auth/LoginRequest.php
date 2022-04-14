<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'поле <:attribute> обязательно для заполнения',
            'email' => 'электронный адрес должен быть валидным',
        ];
    }

    public function attributes(): array
    {
        return [
            'password' => 'Пароль',
        ];
    }
}
