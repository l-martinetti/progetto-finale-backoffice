<?php

namespace App\Http\Controllers;

use App\Models\Console;
use Illuminate\Http\Request;

class ConsoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consoles = Console::all();

        return view('consoles.index', compact('consoles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('consoles.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newConsole = new Console;

        $newConsole->name = $data['name'];

        $newConsole->save();

        if ($request->has('videogames')) {
            $newConsole->videogames()->attach($data['videogames']);
        }

        return redirect()->route("consoles.show", $newConsole);
    }

    /**
     * Display the specified resource.
     */
    public function show(Console $console)
    {
        return view('consoles.show', compact('console'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Console $console)
    {
        return view('consoles.form', compact('console'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Console $console)
    {
        $data = $request->all();

        $console->name = $data['name'];

        $console->save();

        if ($request->has('videogames')) {
            $console->videogames()->sync($data['videogames']);
        } else {
            $console->videogames()->detach($data['videogames']);
        }


        return redirect()->route("consoles.show", $console);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Console $console)
    {
        $console->delete();

        return redirect()->route('consoles.index');
    }
}
