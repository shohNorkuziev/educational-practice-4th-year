<?php

namespace App\Http\Resources\application;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationCreateResource extends JsonResource
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
            'ad' => [
                'id' => $this->ad->id,
                'name' => $this->ad->title
            ],
            'price' => $this->price
        ];
    }
}
