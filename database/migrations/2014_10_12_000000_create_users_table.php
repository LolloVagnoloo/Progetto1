<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->rememberToken();
            $table->timestamps();

            $table->string('username');
            $table->string('password');
            $table->enum('role', ['client', 'staff', 'admin'])->default('client');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('residence')->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('job', ['Studente','Cassiere','Infermiere','Muratore','Insegnante','Cuoco','Camionista','Segretario','Addetto HR','Elettricista','Commesso','Disoccupato','Altro'])->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
