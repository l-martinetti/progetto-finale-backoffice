<?php

namespace App\Http\Controllers;

use App\Models\Console;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $newConsole->name = $data['description'];

        if (array_key_exists("image", $data)) {
            $img_path = Storage::putFile('uploads', $data['image']);

            $newConsole->image = $img_path;
        }

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

        if (array_key_exists("image", $data)) {
            if ($console->image) {
                Storage::delete($console->image);
            }

            $img_path = Storage::putFile('uploads', $data['image']);

            $console->image = $img_path;
        }

        $console->save();

        if ($request->has('videogames')) {
            $console->videogames()->sync($data['videogames']);
        } else {
            $console->videogames()->detach($data['videogames'] ?? []);
        }


        return redirect()->route("consoles.show", $console);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Console $console)
    {
        if ($console->image) {
            Storage::delete('image');
        }

        $console->videogames()->detach();

        $console->delete();

        return redirect()->route('consoles.index');
    }
}
