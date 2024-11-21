<?php

namespace App\Http\Controllers\Admin;

use App\Models\CarModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarModelController extends Controller
{
    public function index() {
        $carmodels = CarModel::all();
        return view('admin.carmodels.manage', compact('carmodels'));
    }

    public function create() {
        return view('admin.carmodels.create');
    }

    public function store(Request $request) {
        $request->validate([
            'model_name' => 'unique:car_models|required',
            'car_type' => 'required',
            'seat_capacity' => 'required',
            'transmission_type' => 'required',
        ]);
        CarModel::create($request->all());
        return redirect()->route('manage.carmodel')->with('success', 'Car model created successfully.');
    }

    public function edit($id) {
        $carmodel = CarModel::findOrFail($id);
        return view('admin.carmodels.edit', compact('carmodel'));
    }

    public function update(Request $request, $id) {
        $carmodel = CarModel::findOrFail($id);
        $request->validate([
            'model_name' => [
                'required',
                Rule::unique('car_models')->ignore($carmodel->id),
            ],
            'car_type' => 'required',
            'seat_capacity' => 'required',
            'transmission_type' => 'required',
        ]);
        $carmodel->update($request->all());
        return redirect()->route('manage.carmodel')->with('success', 'Car model updated successfully.');
    }

    public function delete($id) {
        $carmodel = CarModel::findOrFail($id);
        $carmodel->delete();
        return redirect()->route('manage.carmodel')->with('success', 'Car model "'. $carmodel->model_name .'" deleted successfully.');
    }

    
}
