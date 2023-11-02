<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use App\Http\Controllers\DatiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\ChiSiamoController;
use App\Http\Controllers\RegistrazioneController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\FaqController;

//route che del guest
Route::get('/register', function() {
    return view('auth.register');
})->name ('registrazione');
Route::get('/chi-siamo', [ChiSiamoController::class, 'index'])->name('chi-siamo');
Route::get('/~grp_53/laraProject/public/', [HomeController::class, 'home'])->name('home');
Route::get('/catalogo', [CatalogoController::class, 'catalogo'])->name('catalogo');
Route::post('/catalogo', [CatalogoController::class, 'filtro'])->name('filtro');



// route dell'utente loggato
Route::resource('/users', UserController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
Route::get('/area-personale', function() {
    return view('profile.edit');
})->name ('area-personale');
Route::get('/prenota-auto', function() {
    return view('prenotaAuto');
})->name ('prenotaAuto');
Route::post('/salva_noleggio', [RentalController::class, 'store'])->name('rental.store');


// route del pannello di controllo

Route::get('/admin-panel', function () {
    return view('adminPanel');
})->name('adminPanel');
Route::post('/salva_auto', [CarController::class, 'store'])->name('car.store');
Route::post('/update_delete', [CarController::class, 'updateOrDelete'])->name('update_or_delete');
Route::post('/noleggi-mese', [RentalController::class, 'getCarRentalsByMonth'])->name('rental_month');
Route::post('/salva_faq', [FaqController::class, 'store'])->name('faq.store');
Route::get('/', [FaqController::class, 'index'])->name('faq.index');
Route::post('/azione3', [FaqController::class, 'updateOrDeleteFaq'])->name('update_or_delete_faq');
Route::post('/azione2', [UserController::class, 'updateOrDeleteStaffer'])->name('update_or_delete_staffer');
Route::delete('/eliminazione-cliente', [UserController::class, 'destroy'])->name('user.destroy');
Route::post('/creastaff', [UserController::class, 'staffStore'])->name('staff.store');














