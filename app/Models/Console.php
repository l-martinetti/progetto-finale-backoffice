<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    public function videogames()
    {
        return $this->belongsToMany(Videogame::class);
    }
}
