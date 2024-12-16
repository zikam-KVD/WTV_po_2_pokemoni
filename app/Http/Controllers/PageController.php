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
    //zajistuje pridani noveho typu do DB pomoci formulare
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
    //pridava pokemona s obrazkem
    public function pridejPokemona(Request $req)
    {
        $val = $req->validate([
            'pokemon-nazev' => 'required|min:3|max:20|unique:pokemons,nazev',
            'pokemon-popis' => 'required|min:3|max:64',
            'pokemon-druh' => 'required|exists:types,id',
            'pokemon-obrazek' => 'required|extensions:jpg,png',
        ]);

        $obr = $req->file('pokemon-obrazek');

        $newPoke = Pokemon::create([
            "nazev" => $val['pokemon-nazev'],
            "druh" => $val['pokemon-druh'],
            "popis" => $val['pokemon-popis'],
        ]);
        $newPoke->save();
        //$newPoke->id; //pomoci ->save() se dostaneme lehci cestou k id
        $posledniPokemon = Pokemon::latest()->orderBy('id', 'DESC')->first();
        $obrNazev = $posledniPokemon->id . "." . $obr->getClientOriginalExtension();
        $obr->move(public_path('images'), $obrNazev);

        return back()->with("message", "Vytvořen pokémon " . $val['pokemon-nazev'] . ".");
    }

    //maze nam typ podle ID
    public function smazTyp(int $id)
    {
        $typ = Typ::find($id);

        if($typ !== null) {

            foreach($typ->pokemons as $pokemon) {
                $pokemon->delete();
            }

            $typ->delete();
            return back()->with("message", "Smazal jsi typ.");
        } else {
            return back()->with("message", "Typ jsem nenašel.");
        }
    }
}
