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
        $carmodels = CarModel::all();

        return view('admin.cars.create', compact('carmodels'));
    }

    public function store(Request $request) { 
        $data = $request->validate([
            'model_id' => 'required',
            'plate_number' => 'unique:cars|required',
            'description' => 'required',
            'base_price' => 'required',
        ]);

        Car::create($data);
        return redirect()->route('manage.cars')->with('success', 'Car created successfully.');
    }

    public function edit($id) {
        $car = Car::findOrFail($id);
        $carmodels = CarModel::all();

        return view('admin.cars.edit', compact('car', 'carmodels'));
    }

    public function update(Request $request, $id) {
        $car = Car::findOrFail($id);
        $data = $request->validate([
            'model_id' => 'required',
            'plate_number' => [
                'required',
                Rule::unique('cars')->ignore($carmodel->id),
            ],
            'description' => 'required',
            'base_price' => 'required',
        ]);

        $car->update($data);
        return redirect()->route('manage.cars')->with('success', 'Car updated successfully.');
    }

    public function delete($id) {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('manage.cars')->with('success', 'Car "'. $car->plate_number .'" deleted successfully.');
    }
}
