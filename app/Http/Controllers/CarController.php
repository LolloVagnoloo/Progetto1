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
    // Crea Auto

    public function store(Request $request)
        {
            $validatedData = $request->validate([
                'brand' => 'required',
                'model' => 'required',
                'plate' => 'required|unique:cars',
                'displacement' => 'required|integer',
                'seats' => 'required|integer',
                'description' => 'required',
                'daily_price' => 'required|integer'

            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
            } else {
                $imageName = NULL;
            }

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

            if (!is_null($imageName)) {
                $destinationPath = public_path() . '/images/cars';
                $image->move($destinationPath, $imageName);
            };

            return view('adminPanel');
        }


        // Modifica/Cancella Auto

        public function updateOrDelete(Request $request)
    {
        $carId = $request->input('car_id');
        $car = Car::find($carId);
        if ($request->has('car_button')) {
            $action = $request->input('car_button');

            if ($action === 'update_car') {

                if ($request->hasFile('new_image')) {
                    $image = $request->file('new_image');
                    $imageName = $image->getClientOriginalName();
                    $destinationPath = public_path() . '/images/cars';
                    $image->move($destinationPath, $imageName);
                    $car->image = $imageName; // Aggiorna il campo image nel database solo se è stato caricato un nuovo file
                }

                $car->plate = $request->input('plate');
                $car->brand = $request->input('brand');
                $car->model = $request->input('model');
                $car->displacement = $request->input('displacement');
                $car->price = $request->input('price');
                $car->seats = $request->input('seats');
                $car->description = $request->input('description');

                $car->save();

                return redirect()->route('adminPanel')->with([
                    'success' => "La vettura è stata aggiornata."
                ]);
            } elseif ($action === 'delete_car') {
                $car->delete();
                return redirect()->route('adminPanel')->with([
                    'success' => "La vettura {$car->brand} {$car->model} targata {$car->plate} è stata rimossa."
                ]);
            }
        }
    }

}
