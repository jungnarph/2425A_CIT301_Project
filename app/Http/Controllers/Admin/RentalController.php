<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RentalController extends Controller
{
    public function index() {
        $rentals = Rental::with('car', 'user')
            ->orderByRaw("FIELD(status, 'Missing', 'Active', 'Completed')")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.rentals.manage', compact('rentals'));
    }

    public function view($id) {
        $rental = Rental::findOrFail($id);
        $users = User::all();
        $cars = Car::all();

        return view('admin.rentals.detail', compact('rental', 'users', 'cars'));
    }

    public function edit(Request $request, $id) {
        $status = $request->query('status', 'null');

        $rental = Rental::findOrFail($id);
        $users = User::all();
        $cars = Car::all();

        return view('admin.rentals.edit', compact('rental', 'users', 'cars', 'status'));
    }

    public function update(Request $request, $id) {
        $rental = Rental::findOrFail($id);

        if ($request->status === 'Active' && $request->pickup_dt !== null && $request->pickup_location !== null) {
            $rental->update([
                'pickup_dt' => $request->pickup_dt,
                'pickup_location' => $request->pickup_location,
                'status' => $request->status,
            ]);

            return redirect()->route('manage.rentals')->with('success', 'Rental ID #' . $rental->id . ' set to "Active".');
        }

        else if ($request->status === 'Completed' && $request->return_dt !== null && $request->return_location !== null) {
            $rental->update([
                'return_dt' => $request->return_dt,
                'return_location' => $request->return_location,
                'status' => $request->status,
                'remarks' => $request->remarks
            ]);

            // Mark the car as available again
            $car = Car::findOrFail($rental->car_id);
            $car->is_available = true;
            $car->save();

            // Send a completion email to the user
            Mail::send('emails.rental_completed', ['rental' => $rental], function ($message) use ($rental) {
                $message->to($rental->user->email)
                        ->subject('Your Rental is Completed');
            });

            return redirect()->route('manage.rentals')->with('success', 'Rental ID #' . $rental->id . ' set to "Completed".');
        }

        return redirect()->route('manage.rentals')->with('error', 'Cannot update the rental details.');
    }
}
