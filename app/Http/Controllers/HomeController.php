<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('landing');
    }

    public function profile() {
        return view('profile');
    }

    public function signin() {
        return view('login');
    }

    public function registration() {
        return view('registration');
    }
        
}
