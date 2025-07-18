@extends('layouts.app')

@section('title', 'Videogames')

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

                                <!-- Bottone per aprire il modal -->
                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal-{{ $videogame->id }}">
                                    Elimina
                                </button>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal-{{ $videogame->id }}" tabindex="-1"
                    aria-labelledby="deleteModalLabel-{{ $videogame->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark text-white">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel-{{ $videogame->id }}">Conferma eliminazione</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Sei sicuro di voler eliminare <strong>{{ $videogame->title }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                <form action="{{ route('videogames.destroy', $videogame) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>

        <div class="text-end mt-4">
            <a href="{{ route('videogames.create') }}" class="btn btn-secondary">
                Aggiungi nuovo videogame
            </a>
        </div>
    </div>

@endsection