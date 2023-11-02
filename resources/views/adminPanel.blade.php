@extends('layouts.app')
@section('content')

@php
    $users = \App\Models\User::all();
    $cars = \App\Models\Car::all();
    //$carRentals = \App\Models\Rental::all();
    $rentalCounts = \App\Models\Rental::all();
    $faqs = \App\Models\Faq::all();
@endphp

@cannot('client')
@can('staff_admin')

<body>

    <h1 style="text-align: center; color: red; font-weight: bold;">PANNELLO DI CONTROLLO</h1>


<br>

<h1 style="margin-bottom: 20px;"> Inserimento Nuova Auto</h1>
<form method="POST" action="{{ route('car.store') }}" enctype="multipart/form-data">
    @csrf

<table>
    <thead>
        <tr>
            <th>Marca</th>
            <th>Modello</th>
            <th>Targa</th>
            <th>Cilindrata</th>
            <th>Numero Posti</th>
            <th>Descrizione</th>
            <th>Prezzo</th>
            <th>File Immagine</th>
            <th>Azione</th>
        </tr>
    </thead>
    <tbody>

        <br>
        <br>

    <tr>
        <td>
            <input type="text" name="brand" required><br><br>
        </td>
        <td>
            <input type="text" name="model" required><br><br>
        </td>
        <td>
            <input type="text" name="plate" required><br><br>
        </td>
        <td>
            <input type="number" name="displacement" required><br><br>
        </td>
        <td>

            <input type="number" name="seats" required><br><br>
        </td>
        <td>
            <textarea name="description" rows="4" required></textarea><br><br>
        </td>
        <td>
            <input type="number" name="daily_price" required><br><br>
        </td>
        <td>
            <!-- Campo di input per l'immagine -->
            <input type="file" name="image" accept=".jpg, .jpeg, .png, .gif" required><br><br>
        </td>
        <td>
            <button type="submit">Salva Nuova Auto</button>
        </td>
    </tr>
    </tbody>
</table>
</form>

<br>

<h1 style="margin-bottom: 20px;">Tabella Macchine</h1>

    <table>
        <thead>
            <tr>
                <th>Marca</th>
                <th>Modello</th>
                <th>Targa</th>
                <th>Cilindrata</th>
                <th>Numero Posti</th>
                <th>Descrizione</th>
                <th>Prezzo</th>
                <th>File Immagine</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @php
                $cars = DB::table('cars')->get();
            @endphp
            @foreach($cars as $car)
            <tr>
                <form method="POST" action="{{ route('update_or_delete') }}" enctype="multipart/form-data">
                    @csrf
                    <td><input type="text" name="brand" value="{{ $car->brand }}"></td>
                    <td><input type="text" name="model" value="{{ $car->model }}"></td>
                    <td><input type="text" name="plate" value="{{ $car->plate }}"></td>
                    <td><input type="text" name="displacement" value="{{ $car->displacement }}"></td>
                    <td><input type="text" name="seats" value="{{ $car->seats }}"></td>
                    <td><input type="text" name="description" value="{{ $car->description }}"></td>
                    <td><input type="text" name="price" placeholder="{{ $car->price }}" value="{{ $car->price }}"></td>
                    <td>
                        @if ($car->image)
                            <input type="text" name="image" value="{{ $car->image }}" placeholder="Nome del file" readonly>
                            <input type="file" name="new_image" accept=".jpg, .jpeg, .png, .gif">
                        @else
                            <input type="file" name="image" accept=".jpg, .jpeg, .png, .gif" required>
                        @endif
                    </td>
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <td>
                        <button type="submit" name="car_button" value="update_car">Modifica</button>
                        <button type="submit" name="car_button" value="delete_car">Cancella</button>
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <h1 style="margin-bottom: 20px;">Noleggi Auto per il Mese</h1>

    <form action="{{ route('rental_month')}}" method="POST">
        @csrf

        <label for="month">Mese:</label>
        <select name="month" id="month">
            <option value="">Inserire Mese</option>
            <option value="1">Gennaio</option>
            <option value="2">Febbraio</option>
            <option value="3">Marzo</option>
            <option value="4">Aprile</option>
            <option value="5">Maggio</option>
            <option value="6">Giugno</option>
            <option value="7">Luglio</option>
            <option value="8">Agosto</option>
            <option value="9">Settembre</option>
            <option value="10">Ottobre</option>
            <option value="11">Novembre</option>
            <option value="12">Dicembre</option>
        </select>

        <button type="submit">Cerca</button>
    </form>

    <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Targa</th>
                    <th>Marca</th>
                    <th>Modello</th>
                    <th>Nome Utente</th>
                    <th>Cognome Utente</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($carRentals) && count($carRentals) > 0)
                @foreach ($carRentals as $carRental)

                <tr>
                    <td>{{ $carRental->plate }}</td>
                    <td>{{ $carRental->brand }}</td>
                    <td>{{ $carRental->model }}</td>
                    <td>{{ $carRental->firstname }}</td>
                    <td>{{ $carRental->lastname }}</td>
                </tr>

                @endforeach
                @else
                <tr>
                    <td colspan="5">Nessun noleggio disponibile per il mese selezionato.</td>
                </tr>
            @endif
            </tbody>
        </table>


@endcan

<!-- ADMIN CODE -->

@can('admin')
<br>


<h1 style="margin-bottom: 20px;">Inserimento Nuovo Membro Staff</h1>

<form method="POST" action="{{ route('staff.store') }}">
    @csrf

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Username</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>

        <br>
        <br>

    <tr>
        <td>
            <input type="text" name="firstname" required><br><br>
        </td>
        <td>
            <input type="text" name="lastname" required><br><br>
        </td>
        <td>
            <input type="text" name="username" required><br><br>
        </td>
        <td>
            <input type="password" name="password" required><br><br>
        </td>
        <td>
            <button type="submit">Salva Nuovo Staffer</button>
        </td>
    </tr>
    </tbody>
</table>
</form>

<br>

<h1 style="margin-bottom: 20px;">Tabella Staffer</h1>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @php
                $users = DB::table('users')
                ->where('role', 'staff')
                ->get();
            @endphp
            @foreach($users as $user)
            <tr>
                <form method="POST" action="{{ route('update_or_delete_staffer') }}">
                    @csrf
                    <td><input type="text" name="firstname" value="{{ $user->firstname }}"></td>
                    <td><input type="text" name="lastname" value="{{ $user->lastname }}"></td>
                    <td><input type="text" name="username" value="{{ $user->username }}"></td>
                    <td><input type="password" name="password" value="{{ $user->firstname }}"></td>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <td>
                        <button type="submit" name="user_button" value="update_staff">Modifica</button>
                        <button type="submit" name="user_button" value="delete_staff">Cancella</button>
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <h1 style="margin-bottom: 20px;">Tabella Cancellazione Clienti</h1>

    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Nome</th>
                <th>Cognome</th>
            </tr>
        </thead>
        <tbody>
            @php
                $users = DB::table('users')
                ->where('role', 'client')
                ->get();
            @endphp
            @foreach($users as $user)
            <tr>
                <form method="POST" action="{{ route('user.destroy') }}">
                    @csrf
                    @method('delete')
                    <td><input type="text" name="username" value="{{ $user->username }}"></td>
                    <td><input type="text" name="firstname" value="{{ $user->firstname }}"></td>
                    <td><input type="text" name="lastname" value="{{ $user->lastname }}"></td>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <td>
                        <button type="submit">Elimina</button>
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <h1 style="margin-bottom: 20px;">Prospetto Noleggi Mensili</h1>

    <table>
        <thead>
            <tr>
                <th>Mese</th>
                <th>Numero di Noleggi Mensili</th>
            </tr>
        </thead>
        <tbody>

            @php
            $currentYear = Date::now()->year;
              $result = DB::table('car_user')
                  ->select(DB::raw('MONTH(start_rent) as mese'), DB::raw('COUNT(*) as numero_auto_noleggiate'))
                  ->whereYear('start_rent', '=', $currentYear)
                  ->groupBy(DB::raw('MONTH(start_rent)'))
                  ->orderBy(DB::raw('MONTH(start_rent)'))
                ->get();
            @endphp

            @foreach ($result as $row)
            <tr>
                <td>{{ date('F', mktime(0, 0, 0, $row->mese, 1)) }}</td> <!-- Converte il numero del mese in nome del mese -->
                <td>{{ $row->numero_auto_noleggiate }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <h1 style="margin-bottom: 20px;">Inserimento Nuova FAQ</h1>

    <form method="post" action="{{ route('faq.store') }}">
        @csrf

        <label>Domanda:</label>
        <input type="text" name="question" required>
        <br>
        <label>Risposta:</label>
        <textarea name="answer" required></textarea>
        <br>
        <input type="submit" value="Aggiungi FAQ">
    </form>

    <br>

    <h1 style="margin-bottom: 20px;">Tabella FAQ</h1>

    <table>
        <thead>
            <tr>
                <th>Domanda</th>
                <th>Risposta</th>
            </tr>
        </thead>
        <tbody>
            @php
                $faqs = DB::table('faq')->get();
            @endphp
            @foreach($faqs as $faq)
            <tr>
                <form method="POST" action="{{ route('update_or_delete_faq') }}">
                    @csrf
                    <td><input type="text" name="question" value="{{ $faq->question }}"></td>
                    <td><input type="text" name="answer" value="{{ $faq->answer }}"></td>
                    <input type="hidden" name="faq_id" value="{{ $faq->id }}">
                    <td>
                        <button type="submit" name="faq_button" value="update_faq">Modifica</button>
                        <button type="submit" name="faq_button" value="delete_faq">Cancella</button>
                    </td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endcan
    @endcannot

</body>

    @endsection





