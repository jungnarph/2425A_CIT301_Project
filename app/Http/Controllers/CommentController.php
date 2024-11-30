<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\CarModel;
use App\Models\Reservation;  // Import the Reservation model

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('comment');
    }

    public function create($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('comment', compact('reservation')); 
    }

    public function store(Request $request, $id)
    {
        $user = Auth::user();
        $car = Car::findOrFail($id);
        $request->validate([
            'content' => 'required|string|max:255',
            'rate' => 'required|integer|min:1|max:5',
        ]);
        // Create the comment
        $comment = Comment::create([
            'user_id' => $user->id,
            'car_id' => $car->id,
            'content' => $request->content,
            'rate' => $request->rate,
        ]);
        // Redirect back with a success message
        return redirect()->route('user.fleet.show', ['id' => $car->id]);
    }
}
