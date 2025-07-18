<?php

namespace App\Http\Controllers;

use App\Models\Console;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videogames = Videogame::all();

        return view('videogames.index', compact('videogames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consoles = Console::all();

        return view('videogames.form', compact('consoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newVideogame = new Videogame();

        $newVideogame->title = $data['title'];
        $newVideogame->description = $data['description'];
        $newVideogame->release_date = $data['release_date'];

        if (array_key_exists("cover_image", $data)) {
            $img_path = Storage::putFile('uploads', $data['cover_image']);

            $newVideogame->cover_image = $img_path;
        }

        $newVideogame->save();

        if ($request->has('consoles')) {
            $newVideogame->consoles()->attach($data['consoles']);
        }


        return redirect()->route("videogames.show", $newVideogame);
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $videogame)
    {
        return view('videogames.show', compact('videogame'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videogame $videogame)
    {
        $consoles = Console::all();

        return view('videogames.form', compact('videogame', 'consoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videogame $videogame)
    {
        $data = $request->all();

        $videogame->title = $data['title'];
        $videogame->description = $data['description'];
        $videogame->release_date = $data['release_date'];

        if (array_key_exists("cover_image", $data)) {
            if ($videogame->cover_image) {
                Storage::delete($videogame->cover_image);
            }

            $img_path = Storage::putFile('uploads', $data['cover_image']);

            $videogame->cover_image = $img_path;
        }

        $videogame->save();

        if ($request->has('consoles')) {
            $videogame->consoles()->sync($data['consoles']);
        } else {
            $videogame->consoles()->detach($data['consoles']);
        }


        return redirect()->route("videogames.show", $videogame);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        if ($videogame->cover_image) {
            Storage::delete('cover_image');
        }

        $videogame->consoles()->detach();

        $videogame->delete();

        return redirect()->route('videogames.index');
    }
}
