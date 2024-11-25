<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Typ;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Ukaz index.
     */
    public function ukazIndex()
    {
        $pokemoni = Pokemon::all();

        return view('welcome', ['pokemonos' => $pokemoni]);
    }

    /**
     * Tohle mi vrací detail pokemona.
     */
    public function ukazDetail(int $cislo)
    {
        $pokemon = Pokemon::find($cislo);

        if($pokemon === null) {
            return abort(404);
        }

        //$typ = Typ::find($pokemon->druh);

    return view('detail', ['poke' => $pokemon/*, 'typ' => $typ*/]);
    }

    public function ukazTyp(int $typ)
    {
        $typ = Typ::find($typ);

        if($typ == null)
        {
            abort(404);
        }

        return view('typy', ['pokemonos' => $typ->pokemons]);
    }
}
