@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="sass\myStyle.scss">
<body>
    <div id="home">
        <div class="d-flex justify-content-center mt-4">
          <h1>Vagnoli - Noleggio Auto</h1>
        </div>

      <div >
        <img id="banner"  src="{{ asset('build\assets\fano.jpg') }}" alt="Fano, Italy" style="display: block; margin: 0 auto; max-width: 50%; height: 500px; animation: photochange 4100ms infinite;">
      </div>


    <section id="vagnoli-info">
        <div class="info-box">
            <p>
                Benvenuti a Vagnoli, il vostro principale servizio di autonoleggio a Fano, Italia. Siamo orgogliosi di offrire una vasta gamma di veicoli moderni e sicuri che sono progettati per soddisfare tutte le vostre esigenze di viaggio. Con anni di esperienza nel settore, il nostro team di professionisti è sempre pronto ad assistervi e a rendere la vostra esperienza di noleggio un'esperienza piacevole e priva di stress.
            </p>
            <p>
                Alla base della nostra missione c'è la vostra completa soddisfazione. Sappiamo quanto sia importante per voi viaggiare con comfort e stile, e ci impegniamo a offrire servizi di alta qualità per consentirvi di esplorare Fano e i suoi dintorni con tranquillità.
            </p>
            <p>
                Alcuni dei punti salienti del nostro servizio includono:
            </p>
            <p>
                <h4 style="font-weight: bold; font-size: 1.2em;"
                >Vasta Selezione di Veicoli:</h4>
                Offriamo una vasta gamma di veicoli tra cui scegliere, dalle auto compatte alle berline di lusso, dalle fuoristrada alle famiglie. Indipendentemente dalla vostra preferenza o necessità, abbiamo il veicolo giusto per voi.
            </p>
            <p>
                <h4 style="font-weight: bold; font-size: 1.2em;"
                >Sicurezza e Manutenzione:</h4>
                La sicurezza dei nostri clienti è la nostra massima priorità. Tutti i nostri veicoli sono regolarmente ispezionati e sottoposti a manutenzione per garantire il massimo livello di sicurezza.
            </p>
            <p>
                <h4 style="font-weight: bold; font-size: 1.2em;"
                >Assistenza 24/7:</h4>
                Il nostro servizio clienti è disponibile 24 ore su 24, 7 giorni su 7, per assistervi in qualsiasi momento. Siamo qui per rispondere alle vostre domande e per aiutarvi in caso di necessità durante il vostro noleggio.
            </p>
            <p>
                <h4 style="font-weight: bold; font-size: 1.2em;"
                >Prezzi Competitivi:</h4>
                Offriamo tariffe competitive per assicurarci che otteniate il massimo valore per i vostri soldi. Nessuna sorpresa sgradevole quando si tratta di costi nascosti.
            </p>
            <p>
                <h4 style="font-weight: bold; font-size: 1.2em;"
                >Esplorate Fano e Oltre:</h4>
                Oltre a fornirvi il veicolo giusto, siamo felici di offrirvi suggerimenti e consigli per esplorare Fano e i dintorni. Conosciamo la zona e vogliamo che trascorriate un'esperienza indimenticabile.
            </p>
            <p>
                Affidatevi a Vagnoli per il vostro prossimo viaggio a Fano e scoprite la differenza di un servizio di autonoleggio di alta qualità. Siamo qui per soddisfare le vostre esigenze di viaggio con il massimo comfort e stile. Contattateci oggi per prenotare il vostro veicolo ideale e iniziare la vostra avventura!
            </p>
            <p><h4 style="font-weight: bold; font-size: 1.2em;"
                >Contattaci per informazioni e prenotazioni:</h4></p>
            <p><h4 style="font-weight: bold; font-size: 1.2em;"
                >Telefono: 123-456-789</h4></p>
            <p><h4 style="font-weight: bold; font-size: 1.2em;">Email: info@vagnoli.com</h4></p>
        </div>
        <br>
        <h2 style="color: red;" > Dove siamo </h2>
        <br>
        <img src="{{ asset('build\assets\geo.jpg') }}" alt="Location on Maps" style="display: block; margin: 0 auto; max-width: 100%; height: 500px;">
    </section>


    <div class="d-flex justify-content-center my-4">
        <h2>Domande frequenti</h2>
    </div>

    @php
        use App\Models\Faq;
        $faqs = Faq::all();
    @endphp

    <div class="accordion" >
        @foreach ($faqs as $faq)
        <div class="accordion-item" style="border: 1px solid #ccc; margin: 10px;">
            <h2 class="accordion-header" id="heading{{ $faq->id }}" style="background-color: #f0f0f0; padding: 10px; cursor: pointer;">
                <button class="accordion-button" style="font-size: 20px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                    <!-- Il tag strong definisce un testo importante ed enfatizzato che verrà mostrato in grassetto
                    usa l'interpolazione per mostrare dei dati php all'interno del corpo -->
                    <strong>{{ $faq->question }}</strong>
                </button>
            </h2>
            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                <div class="accordion-body" style="display: none; padding: 10px; font-size: 20px;">
                    {{ $faq->answer }}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- SCRIPT ACCORDION --}}
    <script src="{{ asset('js/accordion.js') }}"></script>
    <!-- SCRIPT JS PER FAR SCORRERE LE FOTO -->
    <script src="{{ asset('js/home-photo.js') }}"></script>

    </body>

@endsection


