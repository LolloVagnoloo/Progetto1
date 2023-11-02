{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<head>
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @extends('layouts.app')



</head>
@section('content')
<body class="register-full">

    <h1 class="register-title">Registrazione</h1>

    <form class="register-form" method="POST" action="{{ route('users.store') }}">
        @csrf
        <div>
            <x-input-label for="nome" :value="__('Nome')" />
            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" required />
        </div>

        <div class="mt-4">
            <x-input-label for="cognome" :value="__('Cognome')" />
            <x-text-input id="cognome" class="block mt-1 w-full" type="text" name="cognome" required />
        </div>


        <div class="mt-4">
            <x-input-label for="data_nascita" :value="__('Data di nascita')" />
            <x-text-input id="data_nascita" class="block mt-1 w-full" type="date" name="data_nascita" required onkeydown="return false" onpaste="return false"/>
        </div>

        <div class="mt-4">
            <x-input-label for="luogo_residenza" :value="__('Luogo di residenza')" />
            <x-text-input id="luogo_residenza" class="block mt-1 w-full" type="text" name="luogo_residenza" required />
        </div>

        <div class="mt-4">
            <x-input-label for="occupazione" :value="__('Occupazione')" />
            <select id="occupazione" name="occupazione">
                <option value="Studente">Studente</option>
                <option value="Cassiere">Cassiere</option>
                <option value="Infermiere">Infermiere</option>
                <option value="Muratore">Muratore</option>
                <option value="Insegnante">Insegnante</option>
                <option value="Cuoco">Cuoco</option>
                <option value="Camionista">Camionista</option>
                <option value="Segretario">Segretario</option>
                <option value="Addetto HR">Addetto HR</option>
                <option value="Elettricista">Elettricista</option>
                <option value="Commesso">Commesso</option>
                <option value="Disoccupato">Disoccupato</option>
                <option value="Altro">Altro</option>
            </select>
        </div>
        </select><br>

        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Conferma Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Già registrato?') }}
            </a>

            <button class="ml-4">
                {{ __('Registrati') }}
            </button>
        </div>
    </form>
</body>
@endsection
{{-- </html> --}}

