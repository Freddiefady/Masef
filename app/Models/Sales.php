<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;
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
    ];

    public function units(){
        return $this->hasMany(Unit::class, 'sale_id');
    }
}
