<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function show()
    {
        $comments = Comment::latest()->with('user')->get();
        return view('comment', compact('comments')); 
    }
<<<<<<< Updated upstream
}
=======

    public function create($id)
    {
        $car = Car::findOrFail($id);
        return view('comment', compact('car')); 
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
>>>>>>> Stashed changes
