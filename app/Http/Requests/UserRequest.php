<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email'=>'required|string',
            'name'=>'required|string',
            'phone'=>'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'email' => 'Электронный адрес должен быть валидным.',
        ];
    }

    public function attributes(): array
    {
        return [
            'email'=>'Email',
            'name'=>'Имя',
            'phone'=>'Телефон',
        ];
    }
}
