@extends('layouts.master')

@section('content')

    <form action={{ route('videogames.store')}} method="POST">
        @csrf

        <div class="mb-3">
            <label for="videogame_title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="videogame_title" name='title'>
        </div>
        <div class="mb-3">
            <div class="form-floating">
                <label for="videogame_description">Descrizione</label>
                <textarea class="form-control" placeholder="Leave a comment here" id="videogame_description"
                    name='description'></textarea>
            </div>
        </div>
        <div class="mb-3 form-check">
            <label for="videogame_release_date" class="form-label">Data di uscita</label>
            <input type="date" class="form-control" id="videogame_release_date" name='release_date'>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection