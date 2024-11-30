<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function assign($id) {
        $reservation = Reservation::findOrFail($id);
        $cars = Car::where('is_available', 1)
            ->where('model_id', $reservation->car_model_id)
            ->get();

        return view('admin.reservations.confirm', compact('reservation', 'cars'));
    }

    public function confirm(Request $request, $id) {
        $reservation = Reservation::findOrFail($id);

        if ($reservation->status !== 'Pending') {
            return response()->json(['error' => 'This request has already been processed.'], 400);
        }

        // Update the reservation status to 'Confirmed'
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

        // Mark the assigned car as unavailable
        $car = Car::findOrFail($request->car_id);
        $car->is_available = false;
        $car->save();

        // Send confirmation email to the user
        Mail::send('emails.reservation_confirmed', [
            'reservation' => $reservation,
            'car' => $car,  // Pass car details to email template
        ], function ($message) use ($reservation) {
            $message->to($reservation->user->email)
                    ->subject('Reservation Confirmed');
        });

        return redirect()->route('manage.reservations')->with('success','Selected reservation request confirmed.');
    }

    public function cancel($id) {
        $reservation = Reservation::findOrFail($id);

        if ($reservation->status !== 'Pending') {
            return response()->json(['error' => 'This request has already been processed.'], 400);
        }

        // Update the reservation status to 'Canceled'
        $reservation->status = 'Canceled';
        $reservation->save();

        // Send cancellation email to the user
        Mail::send('emails.reservation_canceled', ['reservation' => $reservation], function ($message) use ($reservation) {
            $message->to($reservation->user->email)
                    ->subject('Reservation Canceled');
        });

        return redirect()->route('manage.reservations')->with('success','Selected reservation request canceled.');
    }
}
