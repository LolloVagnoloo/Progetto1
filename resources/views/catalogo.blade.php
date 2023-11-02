@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="public/css/myStyle.css">
    <body>
        <div class="filter-menu">
            <label class="filter-title">Filtri</label>
            <form id="filter-form" method="POST" action="{{ route('filtro') }}">
                @csrf

                <label for="start_rent" class="filter-label">Inizio Noleggio:</label>
                <div class="input-container">
                    <input type="date" id="start_rent" name="start_rent" onkeydown="return false" onpaste="return false">
                </div>

                <label for="end_rent" class="filter-label">Fine Noleggio:</label>
                <div class="input-container">
                <input type="date" id="end_rent" name="end_rent"  onkeydown="return false" onpaste="return false" >
                </div>

                <label for="min-price" class="filter-label">Prezzo Minimo:</label>
                <select id="min-price" name="min-price" class="fixed-width-select">
                    <option value="0">Nessun filtro</option>
                    <option value="0">0 euro</option>
                    <option value="50">50 euro</option>
                    <option value="100">100 euro</option>
                    <option value="150">150 euro</option>
                    <option value="200">200 euro</option>
                </select>

                <label for="max-price" class="filter-label">Prezzo Massimo:</label>
                <select id="max-price" name="max-price" class="fixed-width-select">
                    <option value="9999">Nessun filtro</option>
                    <option value="50">50 euro</option>
                    <option value="100">100 euro</option>
                    <option value="150">150 euro</option>
                    <option value="200">200 euro</option>
                    <option value="9999">Più di 200 euro</option>
                </select>

                <label for="seats-filter" class="filter-label">Posti Disponibili:</label>
                <select id="seats-filter" name="seats" class="fixed-width-select">
                    <option value="">Tutti i posti</option>
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="7">7</option>
                    <option value="9">9</option>
                </select>

                <button id="filter-button" type="submit" class="btn filter-btn">Filtra</button>
            </form>
        </div>

    <div class="container">
        <h1>Auto Disponibili a Noleggio</h1>
        @if(isset($errorMessage))
        <div class="alert alert-danger">
            {{ $errorMessage }}
        </div>
        @else
        <div class="car-grid">
            @foreach ($cars as $car)
            <div class="car">
                <img class="car img" src="{{ asset('images/cars/' . $car->image) }}" alt="Auto">
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
                    <a href="{{ route('prenotaAuto', ['car_id' => $car->id]) }}" class="btn btn_rental">Prenota</a>
                    @elseif (!auth()->check())
                    {{-- <a class="btn btn-primary">Accedi per prenotare</a> --}}
                    <label> Accedi per prenotare </label>
                    @endif
                    @endcannot
                @else
                <label> Scegli le date per prenotare </label>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endif
</body>
@endsection

