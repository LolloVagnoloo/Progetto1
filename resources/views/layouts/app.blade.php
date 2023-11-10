<!-- File principale che rappresenta il layout di base dell'applicazione -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    </head>
    <header>
        @include('partials.navbar')
    </header>

    <body>
            <!-- @yield è un segnaposto che può essere sovrascritto dalle viste figlie -->
            <main class="py-4">
                @yield('content')
            </main>

        <footer>
            @include('partials.footer')
        </footer>
    </body>
</html>
