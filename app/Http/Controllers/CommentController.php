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


}
