<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    public function consoles()
    {
        return $this->belongsToMany(Console::class);
    }
}
