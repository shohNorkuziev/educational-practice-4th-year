<?php

namespace App\Http\Requests\ad;

use App\Http\Requests\api\ApiRequest;

class AdUpdateRequest extends ApiRequest
{    public function rules(): array
    {
        return [
            'user_id' => ['sometimes','exists:users,id'],
            'contractor_id' => ['sometimes','exists:users,id', 'different:user_id'],
            'title' => ['sometimes','string','max:150'],
            'text' => ['sometimes','string'],
            'from' => ['sometimes','date','after:tomorrow'],
            'until' => ['sometimes','date','after:from'],
            'tags' => ['nullable','array'],
            'tags.*' => ['exists:tags,id']
        ];
    }
}
