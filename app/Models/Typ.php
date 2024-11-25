<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typ extends Model
{
    protected $table = "types";

    //vazba PK na FK
    public function pokemons()
    {
        return $this->hasMany(Pokemon::class, 'druh');
    }
}
