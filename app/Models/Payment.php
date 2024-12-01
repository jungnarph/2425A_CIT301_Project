<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'reservation_id',
        'rental_id',
        'status',
        'amount',
        'transaction_id',
        'paid_at',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    public function rental()
    {
        return $this->belongsTo(Rental::class, 'rental_id');
    }//
}
