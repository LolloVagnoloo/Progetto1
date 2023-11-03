
<head>
    @extends('layouts.app')
</head>
@section('content')
<body style="display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 100vh; margin: 0; overflow-y: auto;"
>

    <h1 style="color: red; font-size: 2rem; font-weight: bold; text-align: center; margin-bottom: 1rem;"
    >Registrazione</h1>

    <form class="register-form" method="POST" action="{{ route('users.store') }}" style="max-width: 400px; width: 100%; padding: 20px; text-align: center; border: 2px solid #000;">
        @csrf

        <div>
            <x-input-label style="font-weight: bold; display: inline-block; margin-bottom: 8px;" for="nome" :value="__('Nome')" />
            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" required />
        </div>

        <div class="mt-4">
            <x-input-label style="font-weight: bold; display: inline-block; margin-bottom: 8px;" for="cognome" :value="__('Cognome')" />
            <x-text-input id="cognome" class="block mt-1 w-full" type="text" name="cognome" required />
        </div>

        <div class="mt-4">
            <x-input-label style="font-weight: bold; display: inline-block; margin-bottom: 8px;" for="data_nascita" :value="__('Data di nascita')" />
            <x-text-input id="data_nascita" class="block mt-1 w-full" type="date" name="data_nascita" required onkeydown="return false" onpaste="return false"/>
        </div>

        <div class="mt-4">
            <x-input-label style="font-weight: bold; display: inline-block; margin-bottom: 8px;" for="luogo_residenza" :value="__('Luogo di residenza')" />
            <x-text-input id="luogo_residenza" class="block mt-1 w-full" type="text" name="luogo_residenza" required />
        </div>

        <div class="mt-4">
            <x-input-label style="font-weight: bold; display: inline-block; margin-bottom: 8px;" for="occupazione" :value="__('Occupazione')" />
            <select style="margin: 10px 0; padding: 10px; width: 100%;" id="occupazione" name="occupazione">
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

        <div class="mt-4">
            <x-input-label style="font-weight: bold; display: inline-block; margin-bottom: 8px;" for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" required />
        </div>

        <div class="mt-4">
            <x-input-label style="font-weight: bold; display: inline-block; margin-bottom: 8px;" for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
        </div>

        <div class="mt-4">
            <x-input-label style="font-weight: bold; display: inline-block; margin-bottom: 8px;" for="password_confirmation" :value="__('Conferma Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Già registrato?') }}
            </a>
            <button style="padding: 8px; margin-bottom: 12px; background-color: #007bff; color: #fff; border: none; cursor: pointer;">
                {{ __('Registrati') }}
            </button>
        </div>
    </form>

</body>
@endsection


