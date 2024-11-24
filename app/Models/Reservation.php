<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $primaryKey = 'transaction_id';
    
    protected $fillable = [
        'user_id',
        'car_id',
        'pickup_date',
        'pickup_time',
        'pickup_location',
        'return_date',
        'return_time',
        'return_location',
        'status',
    ];
    // Define relationships (optional)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
}
