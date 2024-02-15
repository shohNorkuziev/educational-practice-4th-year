<?php

namespace App\Http\Requests\tag;

use App\Http\Requests\api\ApiRequest;

class TagUpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required']
        ];
    }
}
