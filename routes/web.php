<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

