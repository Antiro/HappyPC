<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class PasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return ['password' => 'required|current_password:web'];
    }

    public function messages(): array
    {
        return ['required' => '":attribute" - обязателен для заполнения', 'current_password' => 'Пароль - неправильный!'];
    }

    public function attributes(): array
    {
        return ['password' => 'Пароль',];
    }
}
