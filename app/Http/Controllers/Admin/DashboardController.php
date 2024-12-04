<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use App\Models\Rental;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Payment;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $metrics = [
            'total_reservations' => $this->totalReservations(),
            'total_rentals' => $this->totalRentals(),
            'total_revenue' => $this->totalRevenue(),
            'most_rented_car' => $this->mostRentedCar(),
            'pending_reservations' => $this->pendingReservations(),
            'active_rentals' => $this->activeRentals(),
            'daily_revenue' => $this->dailyRevenue(),
        ];

        return view ('admin.dashboard', compact('metrics'));
    }

    private function pendingReservations(){
        return Reservation::where('status', 'Pending')->count();
    }

    private function activeRentals(){
        return Rental::where('status', 'Active')->count();
    }

    private function dailyRevenue() {
        return Payment::whereDate('paid_at', now()->toDateString())
            ->where('status', 'Completed')
            ->sum('amount');
    }

    private function totalReservations(){
        return Reservation::count();
    }

    private function totalRentals() {
        return Rental::count();
    }

    private function totalRevenue(){
        return Payment::where('status', 'Completed')->sum('amount');
    }

    private function mostRentedCar() {
        $carmodel = Rental::join('cars', 'rentals.car_id', '=', 'cars.id')
            ->join('car_models', 'cars.model_id', '=', 'car_models.id')
            ->select('car_models.model_name', DB::raw('COUNT(rentals.id) as rental_count'))
            ->groupBy('car_models.model_name')
            ->orderByDesc('rental_count')
            ->first();

        if ($carmodel) {
            return CarModel::where('model_name', $carmodel->model_name)
                ->select('model_name', 'image_url')
                ->first();
        }

        return null;
    }

}