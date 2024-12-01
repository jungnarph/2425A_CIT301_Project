<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'car_model_id',
        'pickup_dt',
        'pickup_location',
        'return_dt',
        'return_location',
        'has_insurance',
        'total_amount',
        'is_paid',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function carmodel() {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }

    public function rental() {
        return $this->hasOne(Rental::class, 'reservation_id');
    }

    public function payment() {
        return $this->hasOne(Payment::class, 'reservation_id');
    }
}
