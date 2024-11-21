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

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'rolemanager:admin'])->name('admin.dashboard');

Route::get('/admin/fleets', function () {
    return view('admin.fleetmanagement');
})->middleware(['auth', 'verified', 'rolemanager:admin'])->name('admin.fleetmanagement');

// SUPERADMIN ROUTES



// OTHER ROUTES

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

