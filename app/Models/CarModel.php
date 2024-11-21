<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_name',
        'car_type',
        'seat_capacity',
        'transmission_type',
    ];

}
