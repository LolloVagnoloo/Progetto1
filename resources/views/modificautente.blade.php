@extends('layouts.app')
@section('content')
<body>
    <h1>Registrazione</h1>

    <form method="POST" action="">
        <label style="font-weight: bold; display: inline-block; margin-bottom: 8px;">Inserisci il nuovo nome:</label>
        <input type="text" name="nome" required><br>

        <label style="font-weight: bold; display: inline-block; margin-bottom: 8px;">Inserisci il nuovo cognome:</label>
        <input type="text" name="cognome" required><br>

        <label style="font-weight: bold; display: inline-block; margin-bottom: 8px;">Modifica la data di nascita:</label>
        <input type="date" name="data_nascita" required><br>

        <label style="font-weight: bold; display: inline-block; margin-bottom: 8px;">Scegli la tua nuova occupazione:</label>
        <select style="padding: 8px; margin-bottom: 12px;" name="occupazione">
            <option value="studente">Studente</option>
            <option value="lavoratore">Lavoratore</option>
            <option value="altro">Altro</option>
        </select><br>

        <label style="font-weight: bold; display: inline-block; margin-bottom: 8px;">Inserisci la tua email:</label>
        <input type="email" name="email" required><br>

        <label style="font-weight: bold; display: inline-block; margin-bottom: 8px;">Inserisci la nuova Password:</label>
        <input type="password" name="password" required><br>

        <label style="font-weight: bold; display: inline-block; margin-bottom: 8px;">Conferma la nuova Password:</label>
        <input type="password" name="password_confirmation" required><br>

        <input type="submit" value="Registrati">
    </form>
</body>
@endsection

