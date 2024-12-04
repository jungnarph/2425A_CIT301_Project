<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car; 
use App\Models\CarModel; 

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

    public function services() {
        return view('services');
    }

    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }
}
