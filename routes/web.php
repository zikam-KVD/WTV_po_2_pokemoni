<?php

use App\Models\Pokemon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $pokemoni = Pokemon::all();

    return view('welcome', ['pokemonos' => $pokemoni]);
})->name('index');

Route::get('/pokemon-detail', function(){
    return view('bulbasaur');
})->name('detail');
