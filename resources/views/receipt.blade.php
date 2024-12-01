<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyCars | Receipt</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="Landing.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/receipt.css') }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/jpg">
</head>
<body>
    
        <div class="receipt">
        <header class="receipt__header">
            <p class="receipt__title">
            <img class="receipt__logo" src="{{ asset('assets/images/project-logo-transparent.png') }}" alt="EasyCars Logo" style="max-width: 12rem">
            </p>
            <p class="receipt__date">{{ $reservation->created_at->format('Y-m-d H:i') }}</p>
        </header>
        <dl class="receipt__list">
            <div class="receipt__list-row">
            <dt class="receipt__item">Reservation ID</dt>
            <dd class="receipt__cost">{{ $reservation->id }}</dd>
            </div>
            <div class="receipt__list-row">
            <dt class="receipt__item">Base Rate</dt>
            <dd class="receipt__cost">₱{{ number_format($reservation->carModel->base_price,2) }}</dd>
            </div>
            
            <div class="receipt__list-row">
            <dt class="receipt__item">Insurance Fee</dt>
            @if ($reservation->has_insurance == true)
            <dd class="receipt__cost">₱{{ number_format(2000,2) }}</dd>
            @else
            <dd class="receipt__cost">₱{{ number_format(0,2) }}</dd>
            @endif
            </div>
            <div class="receipt__list-row">
            <dt class="receipt__item">Cleaning Fee</dt>
            <dd class="receipt__cost">₱{{ number_format(250,2) }}</dd>
            </div>
            <div class="receipt__list-row">
            <dt class="receipt__item">Days to be rented</dt>
            <dd class="receipt__cost">
            {{
                \Carbon\Carbon::parse($reservation->pickup_dt)->startOfDay()
                ->diffInDays(\Carbon\Carbon::parse($reservation->return_dt)->startOfDay()) + 1
            }}
            </dd>
            </div>
            
            
            <div class="receipt__list-row receipt__list-row--total">
            <dt class="receipt__item">Total</dt>
            <dd class="receipt__cost">₱{{ number_format($reservation->total_amount,2) }}</dd>
            </div>
        </dl>
        </div>
</body>
</html>