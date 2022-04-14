<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status_id'=>'1',
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
            'comment' => 'Комментарий',
        ];
    }
}
