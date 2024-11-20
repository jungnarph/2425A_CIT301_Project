<?php

// In FleetController.php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class FleetController extends Controller
{
    public function show($id)
    {
    $car = Car::with('carModel')->findOrFail($id); // Load the related car model
    return view('fleetcar', compact('car'));
    }
}
