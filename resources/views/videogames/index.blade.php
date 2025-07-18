@extends('layouts.master')

@section('title', "Videogames List")

@section('content')

    <div class="container py-4">
        <ul class="list-unstyled row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($videogames as $videogame)
                <li class="col d-flex">
                    <div class="card h-100 shadow-sm">
                        @if ($videogame->cover_image)
                            <img src="{{ asset('storage/' . $videogame->cover_image) }}" alt="{{ $videogame->title }}"
                                class="card-img-top img-fluid">
                        @else
                            <img src="https://placehold.co/600x400" alt="{{ $videogame->title }}" class="card-img-top img-fluid">
                        @endif
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">{{ $videogame->title }}</h5>

                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <a href="{{ route('videogames.show', $videogame) }}"
                                    class="btn btn-sm btn-outline-primary">Dettagli</a>
                                <a href="{{ route('videogames.edit', $videogame) }}"
                                    class="btn btn-sm btn-outline-secondary">Modifica</a>

                                <form action="{{ route('videogames.destroy', $videogame) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Elimina</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="text-end mt-4">
            <a href="{{ route('videogames.create') }}" class="btn btn-secondary">
                Aggiungi nuovo videogame
            </a>
        </div>
    </div>

@endsection