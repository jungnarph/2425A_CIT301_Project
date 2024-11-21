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

        // Check if the file already exists in the target folder
        if (!file_exists($targetFile)) {
            $request->image_url->move(public_path($destinationPath), $finalImageName);
        } 

        Car::create($data);
        return redirect()->route('manage.car')->with('success', 'Car created successfully.');
    }

    public function delete($id) {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('manage.car')->with('success', 'Car "'. $car->plate_number .'" deleted successfully.');
    }
}
