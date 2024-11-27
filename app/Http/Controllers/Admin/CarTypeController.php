<?php

namespace App\Http\Controllers\Admin;

use App\Models\CarType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarTypeController extends Controller
{
    public function index() {
        $cartypes = CarType::all();
        return view('admin.cartypes.manage', compact('cartypes'));
    }

    public function create() {
        return view('admin.cartypes.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'type_name' => 'unique:car_types|required',
            'insurance_fee' => 'required',
        ]);

        CarType::create($data);
        return redirect()->route('manage.cartypes')->with('success', 'Car type created successfully.');
    }

    public function edit($id) {
        $cartype = CarType::findOrFail($id);
        return view('admin.cartypes.edit', compact('cartype'));
    }

    public function update(Request $request, $id) {
        $cartype = CarType::findOrFail($id);
        $data = $request->validate([
            'type_name' => [
                'required',
                Rule::unique('car_types')->ignore($cartype->id),
            ],
            'insurance_fee' => 'required',
        ]);

        $cartype->update($data);
        return redirect()->route('manage.cartypes')->with('success', 'Car type updated successfully.');
    }

    public function delete($id) {
        $cartype = CarType::findOrFail($id);
        $cartype->delete();
        return redirect()->route('manage.cartypes')->with('success', 'Car type "'. $cartype->type_name .'" deleted successfully.');
    }
}
