<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_name',
        'description',
        'type_id',
        'base_price',
        'seat_capacity',
        'transmission_type',
        'layout_type',
        'engine',
        'power',
        'torque',
        'average_rating',
        'image_url',
    ];
    
    public function carType() {
        return $this->belongsTo(CarType::class, 'type_id');
    }

    public function cars() {
        return $this->hasMany(Car::class, 'model_id');
    }

    public function reservations() {
        return $this->hasMany(Reservation::class, 'car_model_id');
    }

    public function comments () {
        return $this->hasMany(Comment::class,'car_model_id');
    }
}
