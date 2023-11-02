<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Chiudi Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Una volta chiuso il tuo account, tutti i dati saranno cancellati definitivamente. Prima di cancellare il tuo account, per favore scarica tutti i dati e le informazioni che desideri preservare.') }}
        </p>
    </header>


    <form method="post" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Sei sicuro di voler cancellare il tuo account? Questa azione è irreversibile.');">
        @csrf
        @method('delete')

        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
            Elimina Account
        </button>
    </form>

</section>
