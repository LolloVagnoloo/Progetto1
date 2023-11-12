<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CatalogoController extends Controller
{
    public function index()
    {
        return view('Catalogo');
    }

    //Con questa funzione mostro la vista catalogo e tutti gli elementi cars
    public function catalogo()
    {
    $cars = Car::all(); // Ottieni tutte le auto dal database

    return view('catalogo', compact('cars'));
    }


    //Funzione che regola il filtraggio delle auto sul catalogo
public function filtro(Request $request)
    {
        //Prendo i dati dal filtro
        $startRent = $request->input('start_rent');
        $endRent = $request->input('end_rent');
        $minPrice = $request->input('min-price');
        $maxPrice = $request->input('max-price');
        $seats = $request->input('seats');

        /* Salvo in sessione i due campi delle date */
        session(['start_rent' => $startRent]);
        session(['end_rent' => $endRent]);

        //Se non sono state selezionate date resitituisco un messaggio
        if(empty($startRent) || empty($endRent)){
            $errorMessage = 'Inserire le date di noleggio.';
            return view('catalogo', compact('errorMessage'));
        }

        //Preparo il formato delle date per il controllo
        $currentDate = now(); // Data odierna
        $startRentDate = \Carbon\Carbon::createFromFormat('Y-m-d', $startRent);
        $endRentDate = \Carbon\Carbon::createFromFormat('Y-m-d', $endRent);

        //Controllo che le date di noleggio siano successive alla data odierna
        if ($startRentDate->lessThanOrEqualTo($currentDate) || $endRentDate->lessThanOrEqualTo($currentDate)) {
            $errorMessage = 'Le date di noleggio devono essere successive a quella odierna.';
            return view('catalogo', compact('errorMessage'));
        }

        //Controllo che la data di fine sia maggiore della data di inizio
        if($startRentDate>$endRentDate){
            $errorMessage = 'La data di fine noleggio deve essere successiva a quella di inizio.';
            return view('catalogo', compact('errorMessage'));
        }



        /* FILTRI TABELLA CAR_USER (Seleziono le istanze di noleggi con date non compatibili
         con quelle selezionate dall'user */
        $rentedCarIds = Rental::query()
        ->where(function ($query) use ($startRent, $endRent) {
            $query->where('start_rent', '<=', $endRent)
                ->where('end_rent', '>=', $startRent);
        })
        ->pluck('car_id');
        //pluck() serve a estrarre una sola colonna da una tabella
        //In questo caso ci servono solo i car_id per poi proseguire coi filtri sulla tabella cars


        // Ottieni tutte le car che NON sono nell'array di car_id (quelle NON prenotate)
        $cars = Car::query()
        ->whereNotIn('id', $rentedCarIds);


        // FILTRI TABELLA CARS (PREZZO E POSTI)
        //Una volta applicato il filtro sulle date applico quelli su prezzi e posti

        $cars->when($minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        });

        $cars->when($maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        });

        $cars->when($seats, function ($query, $seats) {
            return $query->where('seats', $seats);
        });

        //Ottengo i risultati finali da mostrare all'user
        $cars = $cars->get();

        //Se non ci sono macchine che soddisfano i requisiti mostro un messaggio
        if (count($cars) === 0) {
            $errorMessage = 'Non ci sono vetture che soddisfano i requisiti.';
            return view('catalogo', compact('errorMessage'));
        }
        else
        {
            // Passa i risultati alla vista e la visualizzo
            return view('catalogo', compact('cars'));
        }
    }
}
