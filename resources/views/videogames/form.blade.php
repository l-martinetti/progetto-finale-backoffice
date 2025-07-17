@extends('layouts.master')

@section('content')

    <h1>{{ isset($videogame) ? 'Modifica Videogioco' : 'Crea Nuovo Videogioco' }}</h1>

    <form action="{{ isset($videogame) ? route('videogames.update', $videogame->id) : route('videogames.store') }}"
        method="POST" enctype="multipart/form-data">
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

        <div class="mb-3">
            <label class="form-label">Console:</label>
            @foreach($consoles as $console)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="console_{{ $console->id }}" name="consoles[]"
                        value="{{ $console->id }}" {{ (old('consoles') && in_array($console->id, old('consoles'))) ||
                (isset($videogame) && $videogame->consoles->contains($console->id)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="console_{{ $console->id }}">
                        {{ $console->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="image">Immagine</label>
            <input id="image" name="cover_image" type="file">

            @if (isset($videogame) && $videogame->cover_image)
                <div id="videogame-image">
                    <img class="img-fluid" src="{{ asset('storage/' . $videogame->cover_image)}}" alt="copertina">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($videogame) ? 'Aggiorna' : 'Crea' }}
        </button>

        <a href="{{ route('videogames.index') }}" class="btn btn-secondary">Annulla</a>
    </form>

@endsection