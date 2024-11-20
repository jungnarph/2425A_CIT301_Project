<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $primaryKey = 'car_id'; // Explicitly define the primary key
    protected $table = 'cars'; // Table name

    // Define the inverse relationship
    public function carModel()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id'); // Define the correct foreign key here
    }
}
