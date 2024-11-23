<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\CarModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() {
        $cars = Car::with('carModel')->get();
        return view("admin.cars.manage", compact("cars"));
    }

    public function create() {
        $carModels = CarModel::all();

        return view('admin.cars.create', compact('carModels'));
    }

    public function store(Request $request) { 
        $data = $request->validate([
            'model_id' => 'required',
            'plate_number' => 'unique:cars|required',
            'description' => 'required',
            'base_price' => 'required',
        ]);

        Car::create($data);
        return redirect()->route('manage.car')->with('success', 'Car created successfully.');
    }

    public function delete($id) {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('manage.car')->with('success', 'Car "'. $car->plate_number .'" deleted successfully.');
    }
}
