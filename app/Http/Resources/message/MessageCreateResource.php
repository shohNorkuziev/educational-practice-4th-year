<?php

namespace App\Http\Resources\message;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageCreateResource extends JsonResource
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
            'text' => $this->text,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->last_name.' '.$this->user->first_name
            ],
            'created_at' => $this->created_at
        ];
    }
}
