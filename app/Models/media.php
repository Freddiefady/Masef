<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'unit_id', 'room_id'];

    public function room(){
        return $this->belongsTo(Rooms::class, 'room_id');
    }
    public function unit(){
        return $this->belongsTo(Units::class, 'unit_id');
    }
}
