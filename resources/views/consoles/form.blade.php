@extends('layouts.master')

@section('content')

    <h1>{{ isset($console) ? 'Modifica Console' : 'Crea Nuova Console' }}</h1>

    <form action="{{ isset($console) ? route('consoles.update', $console->id) : route('consoles.store') }}" method="POST">
        @csrf
        @if(isset($console))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="console_name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="console_name" name="name"
                value="{{ old('name', $console->name ?? '') }}">
        </div>

        {{-- <div class="mb-3">
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
        </div> --}}

        <button type="submit" class="btn btn-primary">
            {{ isset($console) ? 'Aggiorna' : 'Crea' }}
        </button>

        <a href="{{ route('consoles.index') }}" class="btn btn-secondary">Annulla</a>
    </form>

@endsection