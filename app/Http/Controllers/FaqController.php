<?php

namespace App\Http\Controllers;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    //Mostro la home con tutte le FAQ
    public function index()
{
    $faqs = Faq::all();
    return view('home', compact('faqs'));
}


    //Inserimento FAQ
    public function store(Request $request)
    {
        //Istanzio un oggetto FAQ
        $faq = new Faq();

        //Prendo in input i campi
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');

        //salvo l'oggetto sul db
        $faq->save();

        //Richiamo la rotta che riporta alla home
        return redirect()->route('adminPanel')->with([
            'success' => "FAQ creata con successo."
        ]);

    }



    public function update(Request $request, Faq $faq)
    {
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');

        $faq->update();

    }


    public function updateOrDeleteFaq(Request $request)
    {
        //trovo id della singola faq
        $faqId = $request->input('faq_id');
        //Seleziono l'oggetto corrispondente
        $faq = Faq::find($faqId);
        if ($request->has('faq_button')) {
            $action = $request->input('faq_button');

            if ($action === 'update_faq') {
                // Esegui l'aggiornamento della FAQ qui
                $faq->question = $request->input('question');
                $faq->answer = $request->input('answer');
                $faq->update();
                return redirect()->route('adminPanel')->with([
                    'success' => "FAQ aggiornata con successo."
                ]);
            } elseif ($action === 'delete_faq') {
                // Esegui l'eliminazione della FAQ qui
                $faq->delete();
                return redirect()->route('adminPanel')->with([
                    'success' => "La FAQ è stata rimossa."
                ]);
            }
        }

    }


    public function destroy(Faq $faq)
    {
        $faq->delete();
    }

}
