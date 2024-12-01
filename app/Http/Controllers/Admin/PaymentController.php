<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use App\Models\Rental;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function index() {
        $payments = Payment::with('reservation', 'rental')->get();

        return view('admin.payments.manage', compact('payments'));
    }

    public function confirm(Request $request) {
        $payment_id = $request->query('payment_id');
        $transaction_id = 'EC-90' . now()->format('d') . Str::upper(Str::random(2)) . random_int(100, 999);

        $payment = Payment::findOrFail($payment_id);
        
        $payment->update([
            'status'=> 'Completed',
            'transaction_id' => $transaction_id,
        ]);

        $reservation = Reservation::findOrFail($payment->reservation_id);
        $reservation->update([
            'is_paid' => true,
        ]);

        $rental = Rental::find($payment->rental_id);
        if ($rental) {
            $rental->update([
                'is_paid' => true,
            ]);
        }

        return redirect()->route('manage.payments')->with('success','Payment confirmed successfully');
    }
}
