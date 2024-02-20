<?php

namespace App\Http\Resources\ad;

use App\Http\Resources\tag\TagCreateResource;
use App\Http\Resources\user\UserCreateResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdCreateResource extends JsonResource
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
            'title' => $this->title,
            'text' => $this->text,
            'from' => $this->from,
            'until' => $this->until,
            'tags' => TagCreateResource::collection($this->tags),
            'user' => UserCreateResource::make($this->user),
            'contractor' => UserCreateResource::make($this->contractor)
        ];
    }
}
