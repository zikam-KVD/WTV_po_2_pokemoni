<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = "pokemons";
    protected $fillable = ["nazev", "druh", "popis"];

    //vazba ciziho klice na PK
    public function typ()
    {
        return $this->belongsTo(Typ::class, 'druh', 'id');
    }
}
