<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' =>
                [
                'required',
//                "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*!@=#$%^&*)[a-zA-Z0-9!@=#$%^&*]{8,}$/",
                  'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$/',
                'confirmed'

                ]
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'email' => 'Электронный адрес должен быть валидным.',
            'min' => 'Поле :attribute должно содержать не менее :min симв.',
            'confirmed' => 'Пароли не совпадают.',
            'regex' => 'Пароль должен содержать не менее 8 символов, среди которых должны быть хотя-бы одина: заглавный латинская буква; строчная латинская буква; цифра.'
        ];
    }

    public function attributes(): array
    {
        return [
            'password' => 'Пароль',
            'name' => 'Имя',
            'surname' => 'Фамилия'
        ];
    }
}
