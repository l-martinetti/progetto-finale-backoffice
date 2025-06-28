<?php

namespace Database\Seeders;

use App\Models\Console;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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

            $newConsole->save();
        }
    }
}
