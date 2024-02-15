<?php

namespace App\Http\Requests\user;

use App\Http\Requests\api\ApiRequest;
class UserAuthRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'email'=>['email', 'email:dns,rfc', 'required'],
            'password'=>['required','min:5']
        ];
    }
}
