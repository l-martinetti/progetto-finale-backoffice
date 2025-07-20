<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    protected $fillable = [
        'title',
        'description',
        'release_date',
        'cover_image'
    ];

    protected $guarded = ['id'];
    public function consoles()
    {
        return $this->belongsToMany(Console::class);
    }
}
