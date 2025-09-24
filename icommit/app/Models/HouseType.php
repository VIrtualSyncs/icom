<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseType extends Model
{
    protected $fillable = [
        'name','slug','description','image',
        'top_view','back_view','land_area','building_area',
        'bedrooms','bathrooms','price','installment_note','facilities'
    ];

    protected $casts = [
        'facilities' => 'array', // otomatis jadi array di PHP
    ];
}
