<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnitsRescource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type_unit' =>$this->type_unit,
            // 'name' =>$this->name,
            'city' => $this->city,
            'compound' => $this->compound,
            'location' => $this->location,
            'no_unit' => $this->no_unit,
            'float_unit' => $this->float,
            'elevator' => $this->elevator,
            'beach_and_unit' => $this->distance_between_beach_and_unit,
            'beach_unit' => $this->distance_between_beach_unit,
            'pool_and_unit' => $this->distance_between_pool_and_unit,
            'pool_unit' => $this->distance_between_pool_unit,
            'Room_amenities' => $this->Room_amenities,
            'available_booking_date' => $this->available_booking_date,
            'policies_roles' => $this->policies_roles,
            'type_booking' => $this->type_booking,
            'price' => $this->price,
            'insurance_amount' => $this->insurance_amount,
            'date' => $this->created_date->diffForHumans()
        ];
    }
}
