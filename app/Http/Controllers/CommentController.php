<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\CarModel;
use App\Models\Rental;  
use App\Models\Reservation;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show(Request $request) {
        $rental_id = $request->query('rental_id');
        $token = $request->query('token');

        $rental = Rental::where('id', $rental_id)
            ->where('token', $token)
            ->first();
        
        if (!$rental || $rental->user_id != auth()->id() ) {
            abort(403, 'Unauthorized access');
        }

        $rental = Rental::find($rental_id);
        $carmodel = CarModel::find($rental->car->carModel->id);

        if (!$rental) {
            abort(404, 'Record not found');
        }

        return view('comment', compact('rental', 'carmodel'));
    }

    public function store(Request $request) {
        $rental_id = $request->query('rental_id');
        $token = $request->query('token');

        $rental = Rental::where('id', $rental_id)
            ->where('token', $token)
            ->first();
        
        if (!$rental || $rental->user_id != auth()->id() ) {
            abort(403, 'Unauthorized access');
        }

        $request->validate([
            'content' => 'required|string|max:300',
            'rate' => 'required|int|min:1|max:5',
        ]);

        $comment = Comment::create([
            'rental_id' => $rental->id,
            'user_id' => auth()->id(),
            'car_model_id' => $rental->car->model_id,
            'content' => $request->content,
            'rate' => $request->rate,
        ]);

        $rental->update(['token' => null]);
        
        return redirect()->route('user.fleet.show', $rental->car->model_id)->with('success','Commented successfully!');
    }
}
