<?php

use App\Http\Controllers\PageController;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    [PageController::class, "ukazIndex"]
)->name('index');

Route::get(
    '/pokemon-detail/{cislo}',
    [PageController::class, 'ukazDetail']
)->name('detail');
