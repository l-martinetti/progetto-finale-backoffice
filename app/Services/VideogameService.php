<?php

namespace App\Services;

use App\Models\Videogame;
use Illuminate\Support\Facades\Storage;

class VideogameService
{
    public function create(array $data): Videogame
    {
        $newVideogame = new Videogame();

        $this->assignData($newVideogame, $data);

        $newVideogame->save();

        if (array_key_exists('consoles', $data)) {
            $newVideogame->consoles()->attach($data['consoles']);
        }

        return $newVideogame;
    }

    public function update(Videogame $videogame, array $data): Videogame
    {
        $this->assignData($videogame, $data);

        $videogame->save();

        if (array_key_exists('consoles', $data)) {
            $videogame->consoles()->sync($data['consoles']);
        } else {
            $videogame->consoles()->detach();
        }

        return $videogame;
    }

    private function assignData(Videogame $videogame, array $data): void
    {
        $fillableData = collect($data)->except('cover_image')->toArray();

        $videogame->fill($fillableData);

        if (array_key_exists("cover_image", $data)) {
            if ($videogame->cover_image) {
                Storage::delete($videogame->cover_image);
            }

            $img_path = Storage::putFile('uploads', $data['cover_image']);
            $videogame->cover_image = $img_path;
        }
    }
}
