<?php

// In FleetController.php

namespace App\Http\Controllers;

use App\Models\CarInterim; // Import the Car model
use Illuminate\Http\Request;

class FleetController extends Controller
{
    public function show($id)
    {
        $car = CarInterim::find($id);

        if (!$car) {
            abort(404, 'Car not found'); // Handle the case where the car doesn't exist
        }

        return view('fleetcar', compact('car'));
    }
}

