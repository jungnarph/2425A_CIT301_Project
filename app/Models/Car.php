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
        'description',
        'base_price',
        'engine',
        'power',
        'torque',
        'image_url',
    ];

    public function carModel() {
        return $this->belongsTo(CarModel::class, 'model_id');
    }
}
