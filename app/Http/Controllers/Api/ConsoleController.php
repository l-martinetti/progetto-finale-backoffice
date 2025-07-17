<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Console;
use Illuminate\Http\Request;

class ConsoleController extends Controller
{
    public function index()
    {
        $consoles = Console::with(['videogames'])->get();

        foreach ($consoles as $c) {
            if ($c->image) {
                $c->image = env('DOMINION') . $c->image;
            } else {
                $c->image = 'https://placehold.co/600x400';
            }
        }


        return response()->json([
            "success" => true,
            "data" => $consoles
        ]);
    }

    public function show($id)
    {
        $consoles = Console::with(['videogames'])->find($id);

        foreach ($consoles as $c) {
            if ($c->image) {
                $c->image = env('DOMINION') . $c->image;
            } else {
                $c->image = 'https://placehold.co/600x400';
            }
        }

        return response()->json([
            "success" => true,
            "data" => $consoles
        ]);

    }
}
