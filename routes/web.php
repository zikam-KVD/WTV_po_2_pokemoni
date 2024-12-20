<?php

use App\Http\Controllers\PageController;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Route;

//TODO:
//JetStream
//POST routy

Route::get(
    '/',
    [PageController::class, "ukazIndex"]
)->name('index');

Route::get(
    '/pokemon-detail/{cislo}',
    [PageController::class, 'ukazDetail']
)->name('detail');

Route::get(
    '/pokemon-podle-typu/{typ}',
    [PageController::class, 'ukazTyp']
)->name('typy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //vypis typu
    Route::get(
        '/vypis-typy',
        [PageController::class, 'adminVypisTypy'])->name('admin-typy');

    //routa pridavajici typ do DB
    Route::post('/pridej', [PageController::class, 'pridejTyp'])->name('pridejTyp');

    //vytvari noveho pokemona i s obrazkem
    Route::post(
        '/pridej-pokemona',
        [PageController::class, 'pridejPokemona']
    )->name('pridejPokemona');

    Route::post(
        'typ/smaz/{id}',
        [PageController::class, 'smazTyp']
    )->name('smazTyp');
});
