<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'reservations';

    // Specify the fields that can be mass assigned
    protected $fillable = [
        'pickup_date', 'pickup_time', 'pickup_location',
        'return_date', 'return_time', 'return_location', 'car_id'
    ];

    // Define the relationship with the Car model
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
}
