<?php

namespace App\Http\Controllers;

use App\Models\Videogame;
use Illuminate\Http\Request;

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
        return view('videogames.form');
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

        $newVideogame->save();

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
        return view('videogames.form', compact('videogame'));
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

        $videogame->save();

        return redirect()->route("videogames.show", $videogame);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        $videogame->delete();

        return redirect()->route('videogames.index');
    }
}
