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

Route::get('/landing', function () {
    return view('landing');
});

// USER ROUTES

Route::get('/about', function () {
    return view('about');
})->middleware('auth', 'verified');

Route::get('/fleet', function () {
    return view('fleet');
})->middleware(['auth', 'verified', 'rolemanager:user'])->name('fleet');

Route::get('/fleet/{id}', [FleetController::class, 'show'])->middleware(['auth', 'verified', 'rolemanager:user'])->name('fleet.show');

Route::get('/arrangement', function () {
    return view('arrangement');
})->middleware(['auth', 'verified', 'rolemanager:user'])->name('arrangement');

// ADMIN ROUTES

Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function() {
        Route::controller(AdminController::class)->group(function() {
            Route::get('/dashboard', 'index')->name('admin');
            Route::get('/fleets', function () {
                return view('admin.fleetmanagement');
            })->name('admin.fleetmanagement');
        });
    });
});

// SUPERADMIN ROUTES



// OTHER ROUTES

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

