<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Units;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'days_sales',
        'discount_rate',
        'special_prices',
        'booking_period',
        'holiday_price',
        'unit_id'
    ];
    public function unit(){
        return $this->belongsTo(Units::class, 'unit_id');
    }

    public function rooms(){
        return $this->hasMany(Rooms::class, 'sale_id',);
    }
}
