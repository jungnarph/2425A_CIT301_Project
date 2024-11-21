<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModelInterim extends Model
{
    use HasFactory;

    protected $primaryKey = 'car_model_id'; // Explicitly define the primary key
    protected $table = 'car_model_interim'; // Correct table name

    // Corrected relationship definition
    public function cars()
    {
        return $this->hasMany(Car::class, 'car_model_id'); // Correct foreign key reference
    }
}
