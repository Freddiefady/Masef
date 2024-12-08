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
        'name',
        'city',
        'compound',
        'location',
        'no_unit',
        'float_unit',
        'elevator',
        'distance_between_beach_and_unit',
        'distance_between_beach_unit',
        'distance_between_pool_and_unit',
        'distance_between_pool_unit',
        'Room_amenities',
        'available_booking_date',
        'policies_roles',
        'unit_price',
        'insurance_amount',
        'room_id',
        'sale_id',
];

    public function room(){
        return $this->belongsTo(Rooms::class, 'room_id');
    }

    public function sale(){
        return $this->belongsTo(Sales::class,'sale_id');
    }
}

