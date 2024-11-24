<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\UserReservationController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CarModelController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/landing', function () {
    return view('landing');
})->name('landing');

// USER ROUTES

Route::get('/about', function () {
    return view('about');
})->middleware('auth', 'verified');

Route::middleware(['auth', 'verified', 'rolemanager:user'])->group(function () {
    Route::controller(HomeController::class)->group(function(){
        Route::get('/fleet', 'fleet')->name('user.fleet');
    });
    Route::controller(FleetController::class)->group(function(){
        Route::get('/fleet/{id}', 'show')->name('user.fleet.show');
    });
    Route::controller(UserReservationController::class)->group(function () {
        Route::get('/transaction/{id}', 'create')->name('reservations.create');
        Route::post('/transaction', 'store')->name('reservations.store');
    });
});

// ADMIN AND SUPERADMIN ROUTES

Route::middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {
    Route::prefix('admin')->group(function() {
        Route::controller(UserController::class)->group(function() {
            Route::get('/users/manage', 'index')->name('manage.user');
            Route::get('/user/create', 'create')->name('create.user');
            Route::post('/user/store', 'store')->name('store.user');
            Route::get('/user/edit/{id}', 'edit')->name('edit.user');
            Route::put('/user/update/{id}', 'update')->name('update.user');
            Route::delete('/user/delete/{id}', 'delete')->name('delete.user');
        });
    });
});

Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function() {
        Route::controller(AdminController::class)->group(function() {
            Route::get('/dashboard', 'index')->name('admin');
        });

        Route::controller(CarModelController::class)->group(function() {
            Route::get('/carmodels/manage', 'index')->name('manage.carmodel');
            Route::get('/carmodels/create', 'create')->name('create.carmodel');
            Route::post('/carmodels/store', 'store')->name('store.carmodel');
            Route::get('/carmodels/edit/{id}', 'edit')->name('edit.carmodel');
            Route::put('/carmodels/update/{id}', 'update')->name('update.carmodel');
            Route::delete('/carmodels/delete/{id}', 'delete')->name('delete.carmodel');
        });
       
        Route::controller(CarController::class)->group(function() {
            Route::get('/cars/manage', 'index')->name('manage.car');
            Route::get('/cars/create', 'create')->name('create.car');
            Route::post('/cars/store', 'store')->name('store.car');
            Route::get('/cars/edit/{id}', 'edit')->name('edit.car');
            Route::put('/cars/update/{id}', 'update')->name('update.car');
            Route::delete('/cars/delete/{id}', 'delete')->name('delete.car');
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

