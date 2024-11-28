<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    public function index() {
        $reservations = Reservation::with('carModel', 'user')
            ->orderByRaw("FIELD(status, 'Pending', 'Confirmed', 'Canceled')")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.reservations.manage', compact('reservations'));
    }

    public function view($id) {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.detail', compact('reservation'));
    }

    public function accept($id) {
        $reservation = Reservation::findOrFail($id);
        $cars = Car::where('is_available', 1)->get();

        return view('admin.reservations.accept', compact('reservation', 'cars'));
    }

    public function confirm(Request $request, $id) {
        $reservation = Reservation::findOrFail($id);

        if ($reservation->status !== 'Pending') {
            return response()->json(['error' => 'This request has already been processed.'], 400);
        }

        $reservation->status = 'Confirmed';
        $reservation->save();
        
        // Add to rentals table

        Rental::create([
            'reservation_id' => $reservation->id,
            'user_id' => $reservation->user_id,
            'car_id' => $request->car_id,
            'has_insurance' => $reservation->has_insurance,
            'total_amount' => $reservation->total_amount,
        ]);

        $car = Car::findOrFail($request->car_id);
        $car->is_available = false;
        $car->save();

        return redirect()
            ->route('manage.reservations')
            ->with('success','Selected request accepted. Other similar requests rejected automatically.');
    }
}
