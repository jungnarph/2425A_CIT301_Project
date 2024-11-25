<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RentalTransactionController extends Controller
{
    public function index() {
        return view("admin.rental.requests.manage");
    }
}
