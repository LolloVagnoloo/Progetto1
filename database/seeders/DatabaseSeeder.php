<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Inserisci gli utenti specifici
        DB::table('users')->insert([
            [
                'username' => 'clieclie',
                'password' => Hash::make('HWwuqZIs'),
                'role' => 'client',
                'firstname' => 'Cliente',
                'lastname' => 'Cliente',
                'residence' => 'Fano',
                'birthdate' => '2023-11-02',
                'job' => 'Studente',
            ],
            [
                'username' => 'staffstaff',
                'password' => Hash::make('HWwuqZIs'),
                'role' => 'staff',
                'firstname' => 'Staff',
                'lastname' => 'Staff',
                'residence' => 'Fano',
                'birthdate' => '2023-11-02',
                'job' => 'Muratore',
            ],
            [
                'username' => 'adminadmin',
                'password' => Hash::make('HWwuqZIs'),
                'role' => 'admin',
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'residence' => 'Fano',
                'birthdate' => '2023-11-02',
                'job' => 'Commesso',
            ],
        ]);

        \App\Models\Car::factory(5)->create();

    }
}
