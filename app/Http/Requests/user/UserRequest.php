<?php

namespace App\Http\Requests\user;

use App\Http\Requests\api\ApiRequest;

class UserRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'first_name'=>['required', 'string', 'alpha'],
            'last_name'=>['required', 'string', 'alpha'],
            'patronymic'=>['nullable', 'string', 'alpha'],
            'email'=>['required','email:rfc,dns', 'unique:users,email'],
            'password'=>['required', 'min:5'],
            'role'=>['in:user']
        ];
    }
}
