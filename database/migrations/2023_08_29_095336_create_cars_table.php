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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('plate')->unique();
            $table->string('brand');
            $table->string('model');
            $table->unsignedMediumInteger('displacement'); // Cilindrata
            $table->unsignedMediumInteger('price');
            $table->unsignedSmallInteger('seats')->default(5);
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            // Aggiungere riferimento per la foto


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
