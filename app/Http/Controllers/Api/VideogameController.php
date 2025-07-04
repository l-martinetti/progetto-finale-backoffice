<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Videogame;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    public function index()
    {
        $videogames = Videogame::with(['consoles'])->get();

        return response()->json(
            [
                "success" => true,
                "data" => $videogames
            ]
        );
    }

    public function show($id)
    {
        try {
            $videogame = Videogame::with(['consoles'])->findOrFail($id);

            return response()->json([
                "success" => true,
                "data" => $videogame
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                "message" => "Videogame non trovato"
            ], 404);
        }
    }

}
