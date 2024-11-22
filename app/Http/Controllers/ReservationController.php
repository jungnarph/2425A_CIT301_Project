<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request)
{
    // Static car_id for testing
    $staticCarId = 1; // Replace this with the car_id you want to use

    // Validate the incoming request data
    $request->validate([
        'pickup_date' => 'required|date',
        'pickup_time' => 'required|date_format:H:i',
        'pickup_location' => 'required|string',
        'return_date' => 'required|date',
        'return_time' => 'required|date_format:H:i',
        'return_location' => 'required|string',
    ]);

    // Create the reservation with the static car_id
    $reservation = Reservation::create([
        'pickup_date' => $request->pickup_date,
        'pickup_time' => $request->pickup_time,
        'pickup_location' => $request->pickup_location,
        'return_date' => $request->return_date,
        'return_time' => $request->return_time,
        'return_location' => $request->return_location,
        'car_id' => $staticCarId, // Use the static car_id
    ]);

    // Redirect to the arrangement page with the car data and success message
    return redirect()->route('arrangement')->with('success', 'Reservation successful!');    
}
}

