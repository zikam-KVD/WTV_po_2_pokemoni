<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/pokemon-detail', function(){
    return view('bulbasaur');
})->name('detail');
