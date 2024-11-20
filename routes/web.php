<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FleetController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/about', function () {
    return view('about');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/landing', function () {
        return view('landing');
    })->name('landing');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/arrangement', function () {
        return view('arrangement');
    })->name('arrangement');
});

Route::middleware('auth')->group(function () {
    Route::get('/fleet', function () {
        return view('fleet');
    })->name('fleet');
});

Route::middleware('auth')->group(function () {
    Route::get('/fleet/{id}', [FleetController::class, 'show'])->name('fleet.show');
});

// Protect the admin dashboard route
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        if (!in_array(Auth::user()->usertype, ['admin', 'superadmin'])) {
            abort(403, 'Unauthorized access.');
        }

        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/arrangement', [HomeController::class, 'arrangement'])->name('arrangement');
    Route::post('/reserve', [ReservationController::class, 'store'])->name('reserve.store');
    Route::get('/fleet', [HomeController::class, 'fleet']);
});

require __DIR__ . '/auth.php';

