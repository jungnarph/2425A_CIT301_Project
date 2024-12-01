<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create($id)
    {
        // Retrieve the car by ID or perform any necessary logic
        $carmodel = CarModel::findOrFail($id);
        // Return the transaction view with the car data
        return view('reservation', compact('carmodel')); // 'car' is passed to the view
    }
    
    public function store(Request $request, $id)
    {
        $user = Auth::user();
        $carmodel = CarModel::findOrFail($id);

        $request->merge([
            'insurance' => $request->has('insurance'),
        ]);

        $request->validate([
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',
            'pickup_location' => 'required|string',
            'return_date' => 'required|date',
            'return_time' => 'required',
            'return_location' => 'required|string',
            'insurance' => 'nullable|boolean',
        ]);

        $pickupDateTime = Carbon::parse($request->pickup_date . ' ' . $request->pickup_time);
        $returnDateTime = Carbon::parse($request->return_date . ' ' . $request->return_time);

        $numberOfDays = $pickupDateTime->startOfDay()->diffInDays($returnDateTime->startOfDay()) + 1;
        $baseTotal = $numberOfDays * $carmodel->base_price;
        $insuranceFee = $request->has('insurance') ? 1000 : 0;
        $cleaningFee = 250;

        $calculatedTotalAmount = $baseTotal + $insuranceFee + $cleaningFee;
        
        $reservation = Reservation::create([
            'user_id' => $user->id,
            'car_model_id' => $carmodel->id,
            'pickup_dt' => $request->pickup_date . " " . $request->pickup_time,
            'pickup_location' => $request->pickup_location,
            'return_dt' => $request->return_date . " " . $request->return_time,
            'return_location' => $request->return_location,
            'has_insurance' => $request->has('insurance'),
            'total_amount' => $calculatedTotalAmount,
        ]);
    
        // Redirect back with a success message
        return redirect()->route('reservation.receipt', ['reservation_id' => $reservation->id])->with('success', 'Reservation created successfully!');
    }

    public function receipt(Request $request) {
        $reservation_id = $request->query('reservation_id');

        $reservation = Reservation::findOrFail($reservation_id);
        return view('receipt', compact('reservation'));
    }
}
