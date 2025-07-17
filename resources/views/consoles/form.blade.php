@extends('layouts.master')

@section('content')

    <h1>{{ isset($console) ? 'Modifica Console' : 'Crea Nuova Console' }}</h1>

    <form action="{{ isset($console) ? route('consoles.update', $console->id) : route('consoles.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if(isset($console))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="console_name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="console_name" name="name"
                value="{{ old('name', $console->name ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="image">Immagine</label>
            <input id="image" name="image" type="file">

            @if (isset($console) && $console->image)
                <div id="console-image">
                    <img class="img-fluid" src="{{ asset('storage/' . $console->image)}}" alt="copertina">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($console) ? 'Aggiorna' : 'Crea' }}
        </button>

        <a href="{{ route('consoles.index') }}" class="btn btn-secondary">Annulla</a>
    </form>

@endsection