@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="sass\myStyle.scss">
    <body>
        <div style="background-color: #f8f8f8; padding: 20px; border-radius: 5px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.2;">
            <h2 style="color: red; font-weight: bold; font-size: 24px; text-align: center;">Filtri</h2>
            <form id="filter-form" method="POST" action="{{ route('filtro') }}">
                @csrf

                <label style="font-size: 24px; text-align: center; display: block; margin: 0 auto; margin-bottom: 5px; font-weight: bold;" for="start_rent" class="filter-label">Inizio Noleggio:</label>
                <div style="text-align: center;">
                    <input type="date" id="start_rent" name="start_rent" onkeydown="return false" onpaste="return false" style="width: 100%; padding: 10px; margin: 0 auto; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                </div>

                <label style="font-size: 24px; text-align: center; display: block; margin: 0 auto; margin-bottom: 5px; font-weight: bold;" for="end_rent" class="filter-label">Fine Noleggio:</label>
                <div style="text-align: center;">
                    <input type="date" id="end_rent" name="end_rent" onkeydown="return false" onpaste="return false" style="width: 100%; padding: 10px; margin: 0 auto; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                </div>

                <label style="font-size: 24px; text-align: center; display: block; margin: 0 auto; margin-bottom: 5px; font-weight: bold;" for="min-price" class="filter-label">Prezzo Minimo:</label>
                <select id="min-price" name="min-price" class="fixed-width-select" style="width: 100%; padding: 10px; margin: 0 auto; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                    <option value="0">Nessun filtro</option>
                    <option value="0">0 euro</option>
                    <option value="50">50 euro</option>
                    <option value="100">100 euro</option>
                    <option value="150">150 euro</option>
                    <option value="200">200 euro</option>
                </select>

                <label style="font-size: 24px; text-align: center; display: block; margin: 0 auto; margin-bottom: 5px; font-weight: bold;" for="max-price" class="filter-label">Prezzo Massimo:</label>
                <select id="max-price" name="max-price" class="fixed-width-select" style="width: 100%; padding: 10px; margin: 0 auto; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                    <option value="9999">Nessun filtro</option>
                    <option value="50">50 euro</option>
                    <option value="100">100 euro</option>
                    <option value="150">150 euro</option>
                    <option value="200">200 euro</option>
                    <option value="9999">Più di 200 euro</option>
                </select>

                <label style="font-size: 24px; text-align: center; display: block; margin: 0 auto; margin-bottom: 5px; font-weight: bold;" for="seats-filter" class="filter-label">Posti Disponibili:</label>
                <select id="seats-filter" name="seats" class="fixed-width-select" style="width: 100%; padding: 10px; margin: 0 auto; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                    <option value="">Tutti i posti</option>
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="7">7</option>
                    <option value="9">9</option>
                </select>

                <button id="filter-button" type="submit" class="btn filter-btn" style="background-color: blue; color: white; border: none; border-radius: 4px; padding: 10px 20px; cursor: pointer; width: 50%; display: block; margin: 0 auto;">Filtra</button>
            </form>
        </div>



    <div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
        <h1>Auto Disponibili a Noleggio</h1>
        @if(isset($errorMessage))
        <div class="alert alert-danger">
            {{ $errorMessage }}
        </div>
        @else
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
            @foreach ($cars as $car)
            <div style="border: 1px solid #ccc; padding: 10px; background-color: #fff;">
                <img style="width: 300px; height: 200px;" src="{{ asset('images/cars/' . $car->image) }}" alt="Auto">
                <h2>{{ $car->brand }}</h2>
                <p>Modello: {{ $car->model }}</p>
                <p>Posti: {{ $car->seats }}</p>
                <p>Cilindrata: {{ $car->displacement }}</p>
                <p>Prezzo: ${{ $car->price }} al giorno</p>
                <!-- Mostra pulsante Prenota solo se le date di noleggio sono state inserite. -->
                @if (!empty(request('start_rent')) && !empty(request('end_rent')))
                    @cannot('staff_admin')
                    <!-- Mostra pulsante Prenota solo se l'utente è loggato, altrimenti mostra un messaggio. -->
                    @if (auth()->check())
                    <a href="{{ route('prenotaAuto', ['car_id' => $car->id]) }}" style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; display: block; margin: 0 auto;">Prenota</a>
                    @elseif (!auth()->check())

                    <label style="font-weight: bold; display: inline-block; margin-bottom: 8px;"> Accedi per prenotare </label>
                    @endif
                    @endcannot
                @else
                <label style="font-weight: bold; display: inline-block; margin-bottom: 8px;"> Scegli le date per prenotare </label>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endif
</body>
@endsection

