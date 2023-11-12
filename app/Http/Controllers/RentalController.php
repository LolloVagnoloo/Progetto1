<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    //Salvo un noleggio
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
        return redirect()->route('home');

    }

        // Dati Noleggi per Mese

        public function getCarRentalsByMonth(Request $request)
        {
            //seleziono il mese dall'input e prendo l'anno corrente
            $month = $request->input('month', date('m'));
            $year = now()->year;

            //Query scritta col Query Builder
            $carRentals= DB::table('car_user')
            ->join('cars', 'car_user.car_id', '=', 'cars.id')
            ->join('users', 'car_user.user_id', '=', 'users.id')
            ->select('cars.plate', 'cars.brand', 'cars.model', 'users.firstname', 'users.lastname')
            ->whereYear('car_user.start_rent', $year) //Matcho l'anno con quello presente sulla data di inizio
            ->whereMonth('car_user.start_rent', $month) //Matcho l'anno con quello presente sulla data di inizio

            /*Faccio in modo che nei risultati ci siano i noleggi anche se la data di fine è in un altro mese
             rispetto all'inizio altrimenti prenderebbe solo quelli che sono stati valutati dalla data di inizio
             lo faccio attraverso una funzione di callback che riceve un oggetto Query Builder come argomento*/
            ->orWhere(function ($query) use ($year, $month) {
                $query->whereYear('car_user.end_rent', $year)
                      ->whereMonth('car_user.end_rent', $month);
            })
            ->get();

            //Mostro il pannello di controllo con i risultati della query
             return view('adminPanel')->with('carRentals', $carRentals);

        }


}
