<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRescource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => $this->type,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone_number,
            'image' => asset($this->image),
            'id_image' => asset($this->id_image) ?? null,
            'date' => $this->created_at->format('Y-m-d h:m:s a'),
        ];
    }
}
