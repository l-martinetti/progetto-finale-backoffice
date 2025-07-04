@extends('layouts.master')

@section('content')

    <h1>{{ isset($videogame) ? 'Modifica Videogioco' : 'Crea Nuovo Videogioco' }}</h1>

    <form action="{{ isset($videogame) ? route('videogames.update', $videogame->id) : route('videogames.store') }}"
        method="POST">
        @csrf
        @if(isset($videogame))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="videogame_title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="videogame_title" name="title"
                value="{{ old('title', $videogame->title ?? '') }}">
        </div>

        <div class="mb-3">
            <div class="form-floating">
                <label for="videogame_description">Descrizione</label>
                <textarea class="form-control" placeholder="Leave a comment here" id="videogame_description"
                    name="description">{{ old('description', $videogame->description ?? '') }}</textarea>
            </div>
        </div>

        <div class="mb-3">
            <label for="videogame_release_date" class="form-label">Data di uscita</label>
            <input type="date" class="form-control" id="videogame_release_date" name="release_date"
                value="{{ old('release_date', $videogame->release_date ?? '') }}">
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($videogame) ? 'Aggiorna' : 'Crea' }}
        </button>

        <a href="{{ route('videogames.index') }}" class="btn btn-secondary">Annulla</a>
    </form>

@endsection