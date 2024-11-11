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
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('nazev')->unique();
            $table->unsignedBigInteger('predchozi_vyvoj')->nullable();
            $table->unsignedBigInteger('nasledujici_vyvoj')->nullable();
            $table->unsignedBigInteger('druh');
            $table->string('popis');
            $table->timestamps();

            $table->foreign('druh')->on('types')->references('id');
            $table->foreign('predchozi_vyvoj')->on('pokemons')->references('id');
            $table->foreign('nasledujici_vyvoj')->on('pokemons')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};
