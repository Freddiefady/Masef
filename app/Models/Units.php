<?php

namespace App\Models;

use App\Models\Rooms;
use App\Models\Sales;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Units extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_unit',
        'name',
        'city',
        'compound',
        'location',
        'no_unit',
        'float',
        'elevator',
        'distance_between_beach_and_unit',
        'distance_between_beach_unit',
        'distance_between_pool_and_unit',
        'distance_between_pool_unit',
        'Room_amenities',
        'available_booking_date',
        'policies_roles',
        'type_booking',
        'price',
        'insurance_amount',
];

    public function rooms(){
        return $this->hasMany(Rooms::class, 'unit_id');
    }
    public function sales(){
        return $this->hasMany(Sales::class,'unit_id');
    }
    public function images(){
        return $this->hasMany(media::class, 'unit_id');
    }

    protected $casts = [
        'Room_amenities' => 'array',
    ];
}

