<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;


class CarController extends Controller
{
    // Inserimento Auto

    public function store(Request $request)
        {
            //VAlidazione dei dati inseriti per ogni campo
            $validatedData = $request->validate([
                'brand' => 'required',
                'model' => 'required',
                'plate' => 'required|unique:cars',
                'displacement' => 'required|integer',
                'seats' => 'required|integer',
                'description' => 'required',
                'daily_price' => 'required|integer'

            ]);

            /*Se la variabile request contiene un campo image, viene inserita anch'essa sul DB
            e viene definito un nome per il file */
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
            } else {
                $imageName = NULL;
            }

            /* Viene creata una istanza della classe Car e vengono fillati tutti i campi richiesti sul DB
            infine viene salvato il record sul DB col metodo save() */
            $car = new Car();
            $car->brand = $request->input('brand');
            $car->model = $request->input('model');
            $car->plate = $request->input('plate');
            $car->displacement = $request->input('displacement');
            $car->seats = $request->input('seats');
            $car->description = $request->input('description');
            $car->price = $request->input('daily_price');
            $car->image = $imageName;

            $car->save();

            /* Se esiste un nome dell'immagine, viene definito un percorso
             e la foto viene spostata in quella direcory */
            if (!is_null($imageName)) {
                $destinationPath = public_path() . '/images/cars';
                $image->move($destinationPath, $imageName);
            };

            //Si torna sul pannello di controllo
            return view('adminPanel');
        }


        // Modifica/Cancella Auto

        public function updateOrDelete(Request $request)
    {
        /* Viene individuato l'id della macchina da modificare e viene selezionata l'istanza giusta
        della classe Car*/
        $carId = $request->input('car_id');
        $car = Car::find($carId);
        if ($request->has('car_button')) {
            $action = $request->input('car_button');
            if ($action === 'update_car') {

                // Aggiorna il campo image nel database solo se è stato caricato un nuovo file
                if ($request->hasFile('new_image')) {
                    $image = $request->file('new_image');
                    $imageName = $image->getClientOriginalName();
                    $destinationPath = public_path() . '/images/cars';
                    $image->move($destinationPath, $imageName);
                    $car->image = $imageName;
                }
                //Aggiorno il resto dei campi e salvo il record
                $car->plate = $request->input('plate');
                $car->brand = $request->input('brand');
                $car->model = $request->input('model');
                $car->displacement = $request->input('displacement');
                $car->price = $request->input('price');
                $car->seats = $request->input('seats');
                $car->description = $request->input('description');

                $car->save();
                //Torno al pannello di controllo
                return redirect()->route('adminPanel')->with([
                    'success' => "La vettura è stata aggiornata."
                ]);
                /*Caso in cui voglia eliminare la macchina
                 chiamo il metodo delete() sull'istanza della classe Car selezionata */
            } elseif ($action === 'delete_car') {
                $car->delete();
                return redirect()->route('adminPanel')->with([
                    'success' => "La vettura {$car->brand} {$car->model} targata {$car->plate} è stata rimossa."
                ]);
            }
        }
    }

}
