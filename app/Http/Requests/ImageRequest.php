<?php

namespace App\Http\Requests;

use App\Http\Requests\api\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            "ad_id"=>["required","exists:ads,id"],
            "description"=>["nullable","string","max:255"],
            "image"=>["present","file","mimes:jpg,pdf,png,jfif"],
        ];
    }
}
