<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Reservation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReservationController extends Controller
{
    public function create($id)
    {
        // Retrieve the car by ID or perform any necessary logic
        $car = Car::findOrFail($id);
        // Return the transaction view with the car data
        return view('reservation', compact('car')); // 'car' is passed to the view
    }
    
    public function store(Request $request, $id)
    {
        $user = Auth::user();
        $car = Car::findOrFail($id);

        $request->validate([
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',
            'pickup_location' => 'required|string',
            'return_date' => 'required|date',
            'return_time' => 'required',
            'return_location' => 'required|string',
        ]);
        // Create the reservation
        $reservation = Reservation::create([
            'user_id' => $user->id,
            'car_id' => $car->id,
            'pickup_date' => $request->pickup_date,
            'pickup_time' => $request->pickup_time,
            'pickup_location' => $request->pickup_location,
            'return_date' => $request->return_date,
            'return_time' => $request->return_time,
            'return_location' => $request->return_location,
            'status' => 'pending',
        ]);
    
        // Redirect back with a success message
        return redirect()->route('user.fleet.show', ['id' => $car->id])->with('success', 'Reservation created successfully!');
    }
}
