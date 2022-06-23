<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status_id'=>'',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => '!',
        ];
    }

    public function attributes(): array
    {
        return [
            'evaluation_id'=>'оценка',
            'status_id'=>'статус',
            'text'=> 'комментарий',
        ];
    }
}
