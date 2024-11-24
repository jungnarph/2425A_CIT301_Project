<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Reservation;
use Illuminate\Http\Request;

class UserReservationController extends Controller
{
    public function create($id)
    {
        // Retrieve the car by ID or perform any necessary logic
        $car = Car::findOrFail($id);
        // Return the transaction view with the car data
        return view('transaction', compact('car')); // 'car' is passed to the view
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'car_id' => 'required|integer',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',
            'pickup_location' => 'required|string',
            'return_date' => 'required|date',
            'return_time' => 'required',
            'return_location' => 'required|string',
            'status' => 'required|string',
        ]);
        // Create the reservation
        $reservation = new Reservation();
        $reservation->user_id = $request->user_id;
        $reservation->car_id = $request->car_id;
        $reservation->pickup_date = $request->pickup_date;
        $reservation->pickup_time = $request->pickup_time;
        $reservation->pickup_location = $request->pickup_location;
        $reservation->return_date = $request->return_date;
        $reservation->return_time = $request->return_time;
        $reservation->return_location = $request->return_location;
        $reservation->status = $request->status;
        $reservation->save();
        // Redirect back with a success message
        return redirect()->route('transaction')->with('success', 'Reservation created successfully!');
    }
}
