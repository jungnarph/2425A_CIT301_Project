<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() {
        $payments = Payment::with('reservation', 'rental')->get();

        return view('admin.payments.manage', compact('payments'));
    }
}
