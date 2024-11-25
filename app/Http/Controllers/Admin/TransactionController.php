<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\User;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    public function index(){
        $transactions = Reservation::with('car', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view ('admin.transactions.manage', compact('transactions'));
    }

    public function accept() {

    }
}
