<?php

namespace App\Http\Resources\ad;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdAllResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'items' => AdCreateResource::collection($this->all())
        ];
    }
}
