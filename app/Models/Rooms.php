<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    protected $fillable = [
        'number_of_rooms',
        'number_of_beds',
        'bed_width',
        'Room_amenities',
    ];

    public function unit(){
        return $this->belongsTo(Units::class, 'room_id');
    }
}
