<?php

namespace App\Http\Resources\application;

use App\Http\Resources\user\UserCreateResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => UserCreateResource::make($this->user)->last_name.' '.UserCreateResource::make($this->user)->first_name,
            'price' => $this->price
        ];
    }
}
