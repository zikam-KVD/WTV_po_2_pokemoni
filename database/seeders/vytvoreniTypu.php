<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class vytvoreniTypu extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ["vodni", "#4682b4"],
            ["ohnivy", "#b22222"],
            ["travnatý", "#7cfc00"],
            ["normal", "#d3d3d3"],
        ];

        foreach($types as $typ){
            DB::table('types')->insert([
                "nazev" => $typ[0],
                "barva" => $typ[1],
            ]);
        }
    }
}
