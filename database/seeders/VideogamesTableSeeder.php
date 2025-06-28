<?php

namespace Database\Seeders;

use App\Models\Videogame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class VideogamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $titles = [
            "Death Stranding",
            "Stray",
            "Hollow Knight",
            "Nine Sols",
            "Clair Obscure: Expedition 33",
            "Dave the diver",
            "Dredge",
            "Balatro",
            "Ori and the blind forest",
            "Elden Ring"
        ];

        for ($i = 0; $i < 10; $i++) {
            $newVideogame = new Videogame();

            $newVideogame->title = $titles[$i];
            $newVideogame->description = $faker->text();
            $newVideogame->release_date = $faker->date();

            $newVideogame->save();
        }
    }
}
