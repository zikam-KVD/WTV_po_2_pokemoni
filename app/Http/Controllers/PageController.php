<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Typ;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Throw_;

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

    /**
     * Zobrazeni tpyu prihlasenemu uzivateli.
     */
    public function adminVypisTypy()
    {
        $typy = Typ::all();

        return view('admin-typy', ['tipy' => $typy]);
    }

    public function pridejTyp(Request $request)
    {
        try{
            $valided = $request->validate([
                'typ-nazev' => 'required|min:3|max:50|unique:types,nazev',
                'typ-barva' => 'required|hex_color'
            ]);

            Typ::insert([
                "nazev" => $valided["typ-nazev"],
                "barva" => $request["typ-barva"]
            ]);

            return back()->with("message", "Jupí, přidal jsi typ: " . $valided["typ-nazev"]);
        } catch(Exception $e) {
            return back()->with("message", "Chyba: " . $e->getMessage());
        }

    }
}
