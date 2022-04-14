<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>'required|string',
            'description'=>'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения.',
        ];
    }

    public function attributes(): array
    {
        return [
            'description'=>'Описание',
            'name'=>'Название',
        ];
    }
}
