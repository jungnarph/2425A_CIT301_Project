<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\User;
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

    public function accept($id) {
        $reservation = Reservation::findOrFail($id);
        $cars = Car::all();

        return view('admin.reservations.accept', compact('reservation', 'cars'));
    }

    public function confirm(Request $request, $id) {
        $reservation = Reservation::findOrFail($id);

        // Ensure the rental request is still pending before accepting
        if ($reservation->status !== 'Pending') {
            return response()->json(['error' => 'This request has already been processed.'], 400);
        }

        // Update the status of the selected rental request to 'Approved'
        $reservation->status = 'Confirmed';
        $reservation->save();

        // Reject all other pending requests for the same car model
        Reservation::where('car_model_id', $reservation->car_model_id)
            ->where('id', '!=', $reservation->id)
            ->where('status', 'Pending')
            ->update(['status' => 'Canceled']);

        // Update the availability of the car to 'unavailable'
        $car = Car::findOrFail($request->car_id);
        $car->is_available = false;
        $car->save();

        return redirect()
            ->route('manage.reservations')
            ->with('success','Selected request accepted. Other similar requests rejected automatically.');
    }
}
