<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrazioneController extends Controller
{
    public function registrazione()
    {
        return view('registrazione');
    }
}

