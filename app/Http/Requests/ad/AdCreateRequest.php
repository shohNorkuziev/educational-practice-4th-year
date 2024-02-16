<?php

namespace App\Http\Requests\ad;

use App\Http\Requests\api\ApiRequest;

class AdCreateRequest extends ApiRequest
{

    public function rules(): array
    {
        return [
            'user_id' => ['required','exists:users,id'],
            'contractor_id' => ['required','exists:users,id', 'different:user_id'],
            'title' => ['required','string','max:150'],
            'text' => ['required','string'],
            'from' => ['required','date','after:tomorrow'],
            'until' => ['required','date','after:from'],
            'tags' => ['nullable','array'],
            'tags.*' => ['present' ,'exists:tags,id']
        ];
    }
}
