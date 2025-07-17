<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideogameController extends Controller
{
    public function index()
    {
        $videogames = Videogame::with(['consoles'])->get();

        foreach ($videogames as $vg) {
            if ($vg->cover_image) {
                $vg->cover_image = env('DOMINION') . $vg->cover_image;
            } else {
                $vg->cover_image = 'https://placehold.co/600x400';
            }
        }

        return response()->json([
            "success" => true,
            "data" => $videogames
        ]);
    }

    public function show($id)
    {
        $videogame = Videogame::with(['consoles'])->find($id);

        if ($videogame->cover_image) {
            $videogame->cover_image = env('DOMINION') . $videogame->cover_image;
        } else {
            $videogame->cover_image = 'https://placehold.co/600x400';
        }

        return response()->json([
            "success" => true,
            "data" => $videogame
        ]);

    }

}
