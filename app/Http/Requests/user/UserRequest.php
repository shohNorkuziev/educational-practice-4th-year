<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name'=>['required', 'string', 'alpha'],
            'last_name'=>['required', 'string', 'alpha'],
            'patronymic'=>['nullable', 'string', 'alpha'],
            'email'=>['required','email:rfc,dns', 'unique:users,email'],
            'password'=>['required', 'min:5']
        ];
    }
}
