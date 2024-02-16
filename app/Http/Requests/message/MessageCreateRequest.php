<?php

namespace App\Http\Requests\message;

use Illuminate\Foundation\Http\FormRequest;

class MessageCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'application_id' => ['required','exists:applications,id'],
            'user_id' => ['required','exists:users,id'],
            'text' => ['required','string']
        ];
    }
}
