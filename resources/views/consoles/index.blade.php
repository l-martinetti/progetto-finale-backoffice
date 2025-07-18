@extends('layouts.master')

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

                                <form action="{{ route('consoles.destroy', $console) }}" method="post" class="d-inline">
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
            <a href="{{ route('consoles.create') }}" class="btn btn-secondary">
                Aggiungi nuova console
            </a>
        </div>
    </div>
@endsection