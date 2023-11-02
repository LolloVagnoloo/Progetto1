<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{

    public function store(Request $request)
    {

        $rental = new Rental();
        $user = auth()->user();
        $carId = $request->input('carId');
        $rental->user_id = $user->id;
        $rental->car_id = $carId;
        $rental->start_rent = session('start_rent');
        $rental->end_rent = session('end_rent');
        $rental->save();
        return view('home');

    }

        // Dati Noleggi per Mese

        public function getCarRentalsByMonth(Request $request)
        {
            $month = $request->input('month', date('m'));
            $year = now()->year;


            $carRentals= DB::table('car_user')
            ->join('cars', 'car_user.car_id', '=', 'cars.id')
            ->join('users', 'car_user.user_id', '=', 'users.id')
            ->select('cars.plate', 'cars.brand', 'cars.model', 'users.firstname', 'users.lastname')
            ->whereYear('car_user.start_rent', $year)
            ->whereMonth('car_user.start_rent', $month)
            ->orWhere(function ($query) use ($year, $month) {
                $query->whereYear('car_user.end_rent', $year)
                      ->whereMonth('car_user.end_rent', $month);
            })
            ->get();

            //dd($carRentals);
             return view('adminPanel')->with('carRentals', $carRentals);

        }


}
