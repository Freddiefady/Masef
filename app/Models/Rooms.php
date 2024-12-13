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
        'number_of_bathroom',
        'bed_width',
        'reception',
        'content_kitchen',
        'Room_amenities',
        'unit_id',
        'sale_id',
    ];

    public function unit(){
        return $this->belongsTo(Units::class, 'unit_id');
    }
    public function sale(){
        return $this->belongsTo(Sales::class, 'sale_id');
    }

    public function images(){
        return $this->hasMany(Media::class, 'room_id');
    }

    protected $casts = [
        'Room_amenities' => 'array',
        'reception' => 'array',
        'content_kitchen' => 'array',
    ];
}
