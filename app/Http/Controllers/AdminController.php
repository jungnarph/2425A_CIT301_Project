<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view ('admin.dashboard');
    }

    public function manageCars() {
        return view ('admin.cars.manage');
    }

    public function manageCarModels() {
        return view ('admin.carmodels.manage');
    }

    public function manageUsers() {
        return view ('admin.users.manage');
    }
}
