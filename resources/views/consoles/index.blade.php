@extends('layouts.master')

@section('content')

    <ul>
        @foreach ($consoles as $console)
            <li>
                {{$console->name}}
                <a href={{route('consoles.show', $console)}}>
                    Dettagli
                </a>
                <a href={{route('consoles.edit', $console)}}>
                    Modifica
                </a>
                <form action={{route('consoles.destroy', $console)}} method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Elimina</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('consoles.create') }}">
        <button>Aggiungi nuovo videogame</button>
    </a>
@endsection