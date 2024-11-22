<?php

// In FleetController.php

// In FleetController.php
namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class FleetController extends Controller
{
    public function show($id)
    {
        $car = Car::with('carModel')->find($id);
        if (!$car) {
            abort(404, 'Car not found');
        }
        return view('fleetcar', compact('car'));
    }

    public function arrangement($id)
    {
        $car = Car::with('carModel')->find($id);
        if (!$car) {
            abort(404, 'Car not found');
        }
        return view('arrangement', compact('car'));
    }
    
}




