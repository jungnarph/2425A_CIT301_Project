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
        // Get search query and sort option from the request
        $search = $request->input('search_data');
        $sortOption = $request->input('sort-option');

        // Start the query
        $query = CarModel::query();

        // Apply search filter
        if (!empty($search)) {
            $query->where('model_name', 'LIKE', '%' . $search . '%');
        }

        // Apply sorting
        switch ($sortOption) {
            case 'name_asc':
                $query->orderBy('model_name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('model_name', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->orderBy('model_name', 'asc'); // Default sort
        }

        // Fetch the results
        $carmodels = $query->get();

        // Return view with filtered and sorted car models
        return view('fleet', compact('carmodels'));
    }
        
    
    public function show($id)
    {
        $carmodel = CarModel::findOrFail($id);
        $comments = Comment::where('car_model_id', $carmodel->id)->get();

        return view('fleetcar', compact('carmodel', 'comments'));
    }
}

