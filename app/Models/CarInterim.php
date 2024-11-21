<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarInterim extends Model
{
    use HasFactory;

    protected $primaryKey = 'car_id'; // Explicitly define the primary key
    protected $table = 'car_interim'; // Table name

    // Define the inverse relationship
    public function carModel()
    {
        return $this->belongsTo(CarModelInterim::class, 'car_model_id'); // Define the correct foreign key here
    }
}
