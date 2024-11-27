<?php

// In FleetController.php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\CarModel;

use App\Models\CarInterim; // Import the Car model
use Illuminate\Http\Request;

class FleetController extends Controller
{
    public function show($id)
    {
        $carmodel = CarModel::findOrFail($id);

        return view('fleetcar', compact('carmodel'));
    }
}

