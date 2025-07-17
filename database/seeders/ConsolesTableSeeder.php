<?php

namespace Database\Seeders;

use App\Models\Console;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ConsolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $consoles = [
            "PS5",
            "PS4",
            "PC",
            "Switch",
        ];

        for ($i = 0; $i < 4; $i++) {
            $newConsole = new Console();
            $newConsole->name = $consoles[$i];
            $newConsole->description = $faker->text();

            $newConsole->save();
        }
    }
}
