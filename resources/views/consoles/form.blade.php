@extends('layouts.app')

@section('title', 'Modifica Console')

@section('content')

    <div class="container my-3">
        <h1 class="text-white">{{ isset($console) ? 'Modifica Console' : 'Crea Nuova Console' }}</h1>

        <form action="{{ isset($console) ? route('consoles.update', $console->id) : route('consoles.store') }}"
            method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf
            @if(isset($console))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="console_name" class="form-label text-white">Nome</label>
                <input type="text" class="form-control" id="console_name" name="name"
                    value="{{ old('name', $console->name ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="console_description" class="text-white mb-2">Descrizione</label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="console_description"
                        name="description">
                            {{ isset($console) ? $console->description : '' }}
                        </textarea>

                </div>
            </div>

            <label for="image" class="text-white mb-2">Immagine:</label>
            <div class="d-flex mb-3">
                <input id="image" name="image" type="file" style="color: white;">

                @if (isset($console) && $console->image)
                    <div id="console-image" class="ms-3">
                        <img class="img-fluid" src="{{ asset('storage/' . $console->image)}}" alt="copertina">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">
                {{ isset($console) ? 'Aggiorna' : 'Crea' }}
            </button>

            <a href="{{ route('consoles.index') }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>

@endsection