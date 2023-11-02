<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('maggiorenne', function ($attribute, $value, $parameters, $validator) {
            // Calcola la data attuale meno 18 anni
            $dataAttuale = now();
            $dataMeno18Anni = $dataAttuale->subYears(18);
    
            // Confronta la data di nascita con la data meno 18 anni
            return strtotime($value) <= strtotime($dataMeno18Anni);
        });
    
    }
}
