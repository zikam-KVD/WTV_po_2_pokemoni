<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class vytvoreniPokemonu extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pokes = [
            [
                "name" => "Charmander",
                "druh" => 2,
                "desc" => "Tohle je nejteplejší pokémon."
            ],
            [

                "name" => "Charmeleon",
                "druh" => 2,
                "desc" => "Tohle je 2. nejteplejší pokémon."

            ],
            [
                "name" => "Charizard",
                "druh" => 2,
                "desc" => "Tohle je 3. nejteplejší pokémon."
            ],
            [

                "name" => "Squirle",
                "druh" => 1,
                "desc" => "Tohle je nejmokřejší pokémon."
            ],
        ];

        foreach($pokes as $poke)
        {
            Pokemon::insert([
                "nazev" => $poke["name"],
                "druh" => $poke["druh"],
                "popis" => $poke["desc"],
            ]);
        }
    }
}
