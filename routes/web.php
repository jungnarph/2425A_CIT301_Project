<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CommentController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;

use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CarModelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\RentalController;
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
        Route::get('/services','services')->name('user.services');
        Route::get('/about','about')->name('user.about');
    });
    Route::controller(CommentController::class)->group(function(){
        Route::get('/comment', 'show')->name('comment.show');
        Route::post('/comment', 'store')->name('comment.store');
    });
    Route::controller(FleetController::class)->group(function(){
        Route::get('/fleet/{id}', 'show')->name('user.fleet.show');
    });
    Route::controller(ReservationController::class)->group(function(){
        Route::get('/reservation/{id}', 'create')->name('reservation.create');
        Route::post('/reservation/store/{id}', 'store')->name('reservation.store');
        Route::get('/receipt', 'receipt')->name('reservation.receipt');
    });
});

// ADMIN AND SUPERADMIN ROUTES

Route::middleware(['auth', 'verified', 'rolemanager:superadmin'])->group(function () {
    Route::prefix('admin')->group(function() {
        Route::controller(UserController::class)->group(function() {
            Route::get('/users', 'index')->name('manage.users');
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
        Route::controller(DashboardController::class)->group(function() {
            Route::get('/', 'index')->name('admin');
        });

        Route::controller(CarModelController::class)->group(function() {
            Route::get('/carmodels', 'index')->name('manage.carmodels');
            Route::get('/carmodel/create', 'create')->name('create.carmodel');
            Route::post('/carmodel/store', 'store')->name('store.carmodel');
            Route::get('/carmodel/{id}', 'view')->name('view.carmodel');
            Route::get('/carmodel/edit/{id}', 'edit')->name('edit.carmodel');
            Route::put('/carmodel/update/{id}', 'update')->name('update.carmodel');
            Route::delete('/carmodel/delete/{id}', 'delete')->name('delete.carmodel');
        });
       
        Route::controller(CarController::class)->group(function() {
            Route::get('/cars', 'index')->name('manage.cars');
            Route::get('/car/create', 'create')->name('create.car');
            Route::post('/car/store', 'store')->name('store.car');
            Route::get('/car/{id}', 'view')->name('view.car');
            Route::get('/car/edit/{id}', 'edit')->name('edit.car');
            Route::put('/car/update/{id}', 'update')->name('update.car');
            Route::delete('/car/delete/{id}', 'delete')->name('delete.car');
        });

        Route::controller(AdminReservationController::class)->group(function() {
            Route::get('/reservations', 'index')->name('manage.reservations');
            Route::get('/reservation/{id}', 'view')->name('view.reservation');
            Route::get('/reservation/confirm/{id}', 'assign')->name('assign.reservation');
            Route::put('/reservation/{id}/confirm', 'confirm')->name('confirm.reservation');
            Route::put('/reservation/reject/{id}', 'cancel')->name('cancel.reservation');
        });

        Route::controller(RentalController::class)->group(function() {
            Route::get('/rentals', 'index')->name('manage.rentals');
            Route::get('/rental/{id}', 'view')->name('view.rental');
            Route::get('/rental/edit/{id}', 'edit')->name('edit.rental');
            Route::put('/rental/update/{id}', 'update')->name('update.rental');
        });

        Route::controller(PaymentController::class)->group(function(){
            Route::get('/payments', 'index')->name('manage.payments');
            Route::get('/payment/confirm', 'confirm')->name('confirm.payment');
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

