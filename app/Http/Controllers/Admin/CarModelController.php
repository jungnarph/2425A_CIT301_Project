<?php

namespace App\Http\Controllers\Admin;

use App\Models\CarModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CarModelController extends Controller
{
    public function index() {
        $carmodels = CarModel::orderBy('model_name', 'asc')->get();
        return view('admin.carmodels.manage', compact('carmodels'));
    }

    public function create() {
        return view('admin.carmodels.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'model_name' => 'unique:car_models|required',
            'description' => 'required',
            'car_type' => 'required',
            'base_price' => 'required',
            'seat_capacity' => 'required',
            'transmission_type' => 'required',
            'layout_type' => 'required',
            'engine' => 'required',
            'power'=> 'required',
            'torque'=> 'required',
            'image_url'=> 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $destinationPath = 'assets/images/fleet-image'; 
        $imageName = $request->image_url->getClientOriginalName();
        $imageExtension = $request->image_url->getClientOriginalExtension();
        $finalImageName = pathinfo($imageName, PATHINFO_FILENAME) . '.' . $imageExtension; 

        $targetFile = public_path($destinationPath . '/' . $finalImageName);
        $data['image_url'] = $finalImageName;

        if (!file_exists($targetFile)) {
            $request->image_url->move(public_path($destinationPath), $finalImageName);
        } 

        CarModel::create($data);
        return redirect()->route('manage.carmodels')->with('success', 'Car model created successfully.');
    }

    public function view($id) {
        $carmodel = CarModel::find($id);
        return view('admin.carmodels.detail', compact('carmodel'));
    }

    public function edit($id) {
        $carmodel = CarModel::findOrFail($id);

        return view('admin.carmodels.edit', compact('carmodel'));
    }

    public function update(Request $request, $id) {
        $carmodel = CarModel::findOrFail($id);
        $data = $request->validate([
            'model_name' => [
                'required',
                Rule::unique('car_models')->ignore($carmodel->id),
            ],
            'description', 'required',
            'car_type' => 'required',
            'base_price' => 'required',
            'seat_capacity' => 'required',
            'transmission_type' => 'required',
            'layout_type' => 'required',
            'engine' => 'required',
            'power'=> 'required',
            'torque'=> 'required',
            'image_url'=> 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $destinationPath = 'assets/images/fleet-image'; 
        $imageName = $request->image_url->getClientOriginalName();
        $imageExtension = $request->image_url->getClientOriginalExtension();
        $finalImageName = pathinfo($imageName, PATHINFO_FILENAME) . '.' . $imageExtension; 

        $targetFile = public_path($destinationPath . '/' . $finalImageName);
        $data['image_url'] = $finalImageName;

        if (!file_exists($targetFile)) {
            $request->image_url->move(public_path($destinationPath), $finalImageName);
        } 

        $carmodel->update($data);
        return redirect()->route('manage.carmodels')->with('success', 'Car model updated successfully.');
    }

    public function delete($id) {
        $carmodel = CarModel::findOrFail($id);
        $carmodel->delete();
        return redirect()->route('manage.carmodels')->with('success', 'Car model "'. $carmodel->model_name .'" deleted successfully.');
    }
}
