<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informazioni Profilo Personale') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Aggiorna qua le tue informazioni personali.") }}
        </p>
    </header>

    @php
        use App\Models\User;
        $user = User::find(auth()->id());
    @endphp

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" required autofocus autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <x-input-label for="firstname" :value="__('Nome')" />
            <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" :value="old('firstname', $user->firstname)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
        </div>

        <div>
            <x-input-label for="lastname" :value="__('Cognome')" />
            <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('lastname', $user->lastname)" required autofocus autocomplete="lastname" />
            <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
        </div>

        <div>
            <x-input-label for="residence" :value="__('Luogo di Residenza')" />
            <x-text-input id="residence" name="residence" type="text" class="mt-1 block w-full" :value="old('residence', $user->residence)" required autofocus autocomplete="residence" />
            <x-input-error class="mt-2" :messages="$errors->get('residence')" />
        </div>

        <div>
            <x-input-label for="birthdate" :value="__('Data di Nascita')" />
            <x-text-input id="birthdate" name="birthdate" type="date" class="mt-1 block w-full" :value="old('birthdate', $user->birthdate)" required autofocus autocomplete="birthdate" onkeydown="return false" onpaste="return false"/>
            <x-input-error class="mt-2" :messages="$errors->get('birthdate')" />
        </div>

        <div>

            @php
                $jobOptions = [
                "Studente",
                "Cassiere",
                "Infermiere",
                "Muratore",
                "Insegnante",
                "Cuoco",
                "Camionista",
                "Segretario",
                "Addetto HR",
                "Elettricista",
                "Commesso",
                "Disoccupato",
                "Altro",
            ];
            @endphp

            <x-input-label for="job" :value="__('Lavoro')" />
            <select id="job" name="job" class="mt-1 block w-full" required autofocus>
                @foreach($jobOptions as $option)
                    <option value="{{ $option }}" @if(old('job', $user->job) === $option) selected @endif>{{ $option }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('job')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salva') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Dati salvati.') }}</p>
            @endif
        </div>
    </form>
</section>
