<?php

namespace App\Http\Controllers;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function index()
{
    $faqs = Faq::all();
    return view('home', compact('faqs'));
}



    public function store(Request $request)
    {
        $faq = new Faq();

        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');

        $faq->save();

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
        $faqId = $request->input('faq_id');
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
