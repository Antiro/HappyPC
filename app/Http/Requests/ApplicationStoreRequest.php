<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'comment'=>'required|string',
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
            'comment'=>'комментарий',
        ];
    }
}
