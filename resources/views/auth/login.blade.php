{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/myStyle.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head> --}}

@extends('layouts.app')


@section('content')
<body class="login-full">
    <label class="login-title">Login</label>

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <div>
            <label for="username"> Username </label>
            <input id="username" class="block mt-1 w-full" type="text" name="username" required autofocus autocomplete="username" />
        </div>

        <div class="mt-4">
            <label for="password" > Password </label>

            <input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Ricordami') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit"> Login </button>
        </div>

    </form>
</body>
@endsection
{{-- </html> --}}
