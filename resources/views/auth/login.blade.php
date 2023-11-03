@extends('layouts.app')


@section('content')
<body style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh; margin: 0;"
>
    <label style="color: red; font-size: 2rem; font-weight: bold; text-align: center; margin-bottom: 1rem;"
    >Login</label>

    <form method="POST" action="{{ route('login') }}" style="max-width: 400px; width: 100%; padding: 20px; text-align: center; border: 2px solid #000;">
        @csrf

        <div>
            <label style="font-weight: bold; display: inline-block; margin-bottom: 8px;" for="username"> Username </label>
            <input id="username" class="block mt-1 w-full" type="text" name="username" required autofocus autocomplete="username" />
        </div>

        <div class="mt-4">
            <label style="font-weight: bold; display: inline-block; margin-bottom: 8px;" for="password" > Password </label>

            <input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label style="font-weight: bold; display: inline-block; margin-bottom: 8px;" for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Ricordami') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button style="padding: 8px; margin-bottom: 12px; background-color: #007bff; color: #fff; border: none; cursor: pointer;" type="submit"> Login </button>
        </div>
    </form>

</body>
@endsection
{{-- </html> --}}
