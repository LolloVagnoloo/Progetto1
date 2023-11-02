<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'nome' => 'required',
        'cognome' => 'required',
        'data_nascita' => 'required',
        'luogo_residenza' => 'required',
        'occupazione' => 'required',
        'username' => 'required|unique:users',
        'password' => 'required|confirmed',
        ]);

        $user = new User();

        $user->firstname = $request->input('nome');
        $user->lastname = $request->input('cognome');
        $user->birthdate = $request->input('data_nascita');
        $user->residence = $request->input('luogo_residenza');
        $user->job = $request->input('occupazione');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        Auth::login($user);
        return view('home');

    }


    public function staffStore(Request $request)
    {
    $validatedData = $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'username' => 'required|unique:users',
        'password' => 'required',
        ]);

        $user = new User();
        $user->role = 'staff';

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->birthdate = null;
        $user->residence = null;
        $user->job = null;

        //dd($user);


        $user->save();

        return redirect()->route('adminPanel');

    }


    public function show(User $user)
    {
        return view('users.show', compact('user'))->with('success', 'Nuovo utente registrato con successo');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->firstname = $request->input('nome');
        $user->lastname = $request->input('cognome');
        $user->data_nascita = $request->input('data_nascita');
        $user->residence = $request->input('luogo_residenza');
        $user->job = $request->input('occupazione');
        $user->username = $request->input('username');
        $user->password = $request->input('password');

        $user->update();

    }

    public function updateOrDeleteStaffer(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::find($userId);
        if ($request->has('user_button')) {
            $action = $request->input('user_button');

            if ($action === 'update_staff') {
                // Esegui l'aggiornamento dell'auto qui
                $user->firstname = $request->input('firstname');
                $user->lastname = $request->input('lastname');
                $user->username = $request->input('username');
                $user->password = $request->input('password');
                $user->update();
                return redirect()->route('adminPanel')->with([
                    'success' => "Membro staff aggiornato con successo."
                ]);
            } elseif ($action === 'delete_staff') {
                // Esegui l'eliminazione dell'auto qui
                $user->delete();
                return redirect()->route('adminPanel')->with([
                    'success' => "Lo staffer {$user->firtname} {$user->lastname} è stato rimosso."
                ]);
            }
        }

    }


       public function destroy(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::find($userId);
        $user->delete();
        return redirect()->route('adminPanel')->with([
            'success' => "L'utente {$user->firstname} {$user->lastname}è stato cancellato."
        ]);
    }


}

