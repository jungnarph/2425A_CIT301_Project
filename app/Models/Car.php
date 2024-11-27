<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'plate_number',
    ];

    public function carModel() {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function transactions() {
        return $this->hasMany(RentalRequest::class, 'car_id');
    }
}
