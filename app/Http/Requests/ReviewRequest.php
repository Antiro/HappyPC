<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'required' => 'Необходимо написать :attribute для отзыва',
        ];
    }

    public function attributes(): array
    {
        return [
            'comment' => 'комментарий',
        ];
    }
}
