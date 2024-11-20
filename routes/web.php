<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
<<<<<<< Updated upstream
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
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

// Protect the admin dashboard route
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        if (!in_array(Auth::user()->usertype, ['admin', 'superadmin'])) {
            abort(403, 'Unauthorized access.');
        }

        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/welcome', [HomeController::class, 'index'])->name('welcome');
});

require __DIR__ . '/auth.php';
=======
use App\Http\Controllers\FleetController;


Route::get('/', function () {
    return view('landing');
});

Route::get('/homelander', function () {
    return view('homelander');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/profiles', function () {
    return view('profile');
});

Route::get('/registration', function () {
    return view('registration');
});

Route::get('/arrangement', function () {
    return view('arrangement');
});

Route::get('/fleet', function () {
    return view('fleet');
});

Route::get('/fleet/{id}', [FleetController::class, 'show'])->name('fleet.show');


Route::get('/car/{id}', function($id) {
    $car = Car::find($id); // Ensure you're fetching the car based on the correct ID
    return view('fleet.show', compact('car'));
    });

Route::get('/signin', [HomeController::class, 'signin'])->name('signin');
Route::get('/', [HomeController::class, 'index']);
Route::get('/profile', [HomeController::class, 'profile']);
Route::get('/registration', [HomeController::class, 'registration']);
Route::get('/arrangement', [HomeController::class, 'arrangement'])->name('arrangement');
Route::post('/reserve', [ReservationController::class, 'store'])->name('reserve.store');
Route::get('/fleet', [HomeController::class, 'fleet']);


>>>>>>> Stashed changes

