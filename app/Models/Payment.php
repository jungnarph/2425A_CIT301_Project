<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'reservation_id',
        'rental_id',
        'user_id',
        'amount',
        'payment_method',
        'payment_details',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rental()
    {
        return $this->belongsTo(Rental::class, 'rental_id');
    }//
}
