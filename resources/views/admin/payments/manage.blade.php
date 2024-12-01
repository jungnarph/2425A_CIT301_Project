@extends('admin.layouts.layout')
@section('admin_title')
Payments | EasyCars Admin
@endsection

@section('main_panel')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-md-0">
            <h1 class="h2">Payment Management</h1>
        </div>
    </div>

    @if(session('error'))
        <div class="alert custom-alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert custom-alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Additional content goes here -->
    <div class="">
        <table class="">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Reservation ID</th>
                    <th>Rental ID</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td data-cell="Transaction ID">{{ $payment->transaction_id ?? 'N/A' }}</td>
                    <td data-cell="Reservation ID">{{ $payment->reservation_id }}</td>
                    <td data-cell="Rental ID">{{ $payment->rental_id ?? 'N/A' }}</td>
                    <td data-cell="Amount">₱{{ number_format($payment->amount,2) }}</td>
                    <td data-cell="Status">
                    @if ($payment->status === 'Pending')
                    <select class="form-control status" name="status" style="background-color: orange; display:inline; width: fit-content !important" required>
                        <option value="" selected>Pending</option>
                        <option value="{{ route('confirm.payment', ['payment_id' => $payment->id]) }} ">Completed</option>
                        <option value="">Failed</option>
                    </select>
                    @elseif ($payment->status === 'Completed')
                    <select class="form-control status" name="status" style="background-color: green; display:inline; width: fit-content !important;" required>
                        <option value="" selected>Completed</option>
                    </select>
                    @else
                    <select class="form-control status" name="status" style="background-color: red; max-width: 40%;" required>
                        <option value="" selected>Failed</option>
                    </select>
                    @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('admin_scripts')
<script>
    document.querySelectorAll('.status').forEach(function(element) {
        element.addEventListener('change', function() {
            const selectedRoute = this.value;

            if (selectedRoute !== '') {
                window.location.href = selectedRoute;
            }
        });
    });
</script>
@endsection