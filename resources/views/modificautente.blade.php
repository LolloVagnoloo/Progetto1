@extends('layouts.app')
@section('content')
<body>
    <h1>Registrazione</h1>

    <form method="POST" action="">
        <label>Inserisci il nuovo nome:</label>
        <input type="text" name="nome" required><br>

        <label>Inserisci il nuovo cognome:</label>
        <input type="text" name="cognome" required><br>

        <label>Modifica la data di nascita:</label>
        <input type="date" name="data_nascita" required><br>

        <label>Scegli la tua nuova occupazione:</label>
        <select name="occupazione">
            <option value="studente">Studente</option>
            <option value="lavoratore">Lavoratore</option>
            <option value="altro">Altro</option>
        </select><br>

        <label>Inserisci la tua email:</label>
        <input type="email" name="email" required><br>

        <label>Inserisci la nuova Password:</label>
        <input type="password" name="password" required><br>

        <label>Conferma la nuova Password:</label>
        <input type="password" name="password_confirmation" required><br>

        <input type="submit" value="Registrati">
    </form>
</body>
@endsection

