<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = "pokemons";
    protected $fillable = ["nazev", "druh", "popis"];
}