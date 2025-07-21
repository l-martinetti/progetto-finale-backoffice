<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Videogame\StoreVideogameRequest;
use App\Http\Requests\Videogame\UpdateVideogameRequest;
use App\Models\Console;
use App\Models\Videogame;
use App\Services\VideogameService;
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
    public function store(StoreVideogameRequest $request, VideogameService $service)
    {

        $newVideogame = $service->create($request->validated());

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
    public function update(UpdateVideogameRequest $request, Videogame $videogame, VideogameService $service)
    {
        $this->authorize('update', $videogame);

        $videogame = $service->update($videogame, $request->validated());

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
