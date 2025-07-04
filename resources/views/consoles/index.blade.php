@extends('layouts.master')

@section('content')

    <ul>
        @foreach ($consoles as $console)
            <li>
                {{$console->name}}
                <a href={{route('consoles.show', $console)}}>
                    Dettagli
                </a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('consoles.create') }}">
        <button>Aggiungi nuovo videogame</button>
    </a>
@endsection