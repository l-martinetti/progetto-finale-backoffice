<?php

namespace Database\Seeders;

use App\Models\Console;
use App\Models\Videogame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsoleVideogameSeedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videogames = Videogame::all();
        $consoles = Console::all();

        $videogames->each(function ($videogame) use ($consoles) {
            $randomConsoles = $consoles->random(mt_rand(1, 4));
            $videogame->consoles()->attach($randomConsoles->pluck('id'));
        });
    }
}
