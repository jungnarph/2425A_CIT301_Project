<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\User;
use App\Models\RentalRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RentalRequestController extends Controller
{
    public function index() {
        $rental_requests = RentalRequest::with('car', 'user')
            ->orderByRaw("FIELD(status, 'Pending', 'Approved', 'Rejected')")
            ->orderBy('created_at', 'desc')
            ->get();

         return view('admin.rental.requests.manage', compact('rental_requests'));
    }

    public function accept($id) {
        $rental_request = RentalRequest::findOrFail($id);

        // Ensure the rental request is still pending before accepting
        if ($rental_request->status !== 'Pending') {
            return response()->json(['error' => 'This request has already been processed.'], 400);
        }

        // Update the status of the selected rental request to 'Approved'
        $rental_request->status = 'Approved';
        $rental_request->save();

        // Reject all other pending requests for the same car
        RentalRequest::where('car_id', $rental_request->car_id)
            ->where('id', '!=', $rental_request->id)
            ->where('status', 'Pending')
            ->update(['status' => 'Rejected']);

        // Update the availability of the car to 'unavailable'
        $car = Car::findOrFail($rental_request->car_id);
        $car->is_available = false;
        $car->save();

        // Return a success response
        return redirect()
            ->route('manage.rental.request')
            ->with('success','Selected request accepted. Other similar requests rejected automatically.');
    }
}
