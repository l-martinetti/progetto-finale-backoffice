@extends('layouts.app')

@section('title', 'Consoles')

@section('content')

    <div class="container py-4">
        <ul class="list-unstyled row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($consoles as $console)
                <li class="col d-flex">
                    <div class="card h-100 shadow-sm">
                        @if ($console->image)
                            <img src="{{ asset('storage/' . $console->image) }}" alt="{{ $console->name }}"
                                class="card-img-top img-fluid">
                        @else
                            <img src="https://placehold.co/600x400" alt="{{ $console->name }}" class="card-img-top img-fluid">
                        @endif

                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">{{ $console->name }}</h5>

                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <a href="{{ route('consoles.show', $console) }}"
                                    class="btn btn-sm btn-outline-primary">Dettagli</a>
                                <a href="{{ route('consoles.edit', $console) }}"
                                    class="btn btn-sm btn-outline-secondary">Modifica</a>

                                <!-- Bottone per aprire il modal -->
                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteConsoleModal-{{ $console->id }}">
                                    Elimina
                                </button>
                            </div>
                        </div>
                    </div>
                </li>

                <!-- Modal -->
                <div class="modal fade" id="deleteConsoleModal-{{ $console->id }}" tabindex="-1"
                    aria-labelledby="deleteConsoleModalLabel-{{ $console->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark text-white">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteConsoleModalLabel-{{ $console->id }}">Conferma eliminazione
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Sei sicuro di voler eliminare <strong>{{ $console->name }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                <form action="{{ route('consoles.destroy', $console) }}" method="POST" class="d-inline">
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
            <a href="{{ route('consoles.create') }}" class="btn btn-secondary">
                Aggiungi nuova console
            </a>
        </div>
    </div>

@endsection