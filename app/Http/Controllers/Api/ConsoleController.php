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

        return response()->json([
            "success" => true,
            "data" => $consoles
        ]);
    }

    public function show($id)
    {
        $consoles = Console::with(['videogames'])->find($id);

        return response()->json([
            "success" => true,
            "data" => $consoles
        ]);

    }
}
