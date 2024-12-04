<?php

// In FleetController.php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Comment;

use App\Models\CarInterim; // Import the Car model
use Illuminate\Http\Request;

class FleetController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search_data');
        $sortOption = $request->input('sort_option');

        $query = CarModel::query();

        if (!empty($search)) {
            $query->where('model_name', 'LIKE', '%' . $search . '%');
        }

        switch ($sortOption) {
            case 'name_asc':
                $query->orderBy('model_name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('model_name', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('base_price', 'asc')->orderBy('model_name', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('base_price', 'desc')->orderBy('model_name', 'asc');
                break;
            default:
                $query->orderBy('model_name', 'asc');
        }

        $carmodels = $query->get();

        return view('fleet', compact('carmodels'));
    }
        
    
    public function show($id)
    {
        $carmodel = CarModel::findOrFail($id);
        $comments = Comment::where('car_model_id', $carmodel->id)->get();

        return view('fleetcar', compact('carmodel', 'comments'));
    }
}

