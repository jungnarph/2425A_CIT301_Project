<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'reservation_id',
        'user_id',
        'car_id',
        'pickup_dt',
        'pickup_location',
        'return_dt',
        'return_location',
        'has_insurance',
        'total_amount',
        'is_paid',
        'status',
        'token',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function payment() {
        return $this->hasOne(Payment::class, 'rental_id');
    }
}
