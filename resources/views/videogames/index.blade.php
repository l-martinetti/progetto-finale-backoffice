@extends('layouts.master')

@section('content')

    <ul>
        @foreach ($videogames as $videogame)
            @if ($videogame->cover_image)
                <img src="{{ asset('storage/' . $videogame->cover_image)}}" alt={{$videogame->title}}>
            @endif
            <li>
                {{$videogame->title}}
                <a href={{route('videogames.show', $videogame)}}>
                    Dettagli
                </a>
                <a href={{route('videogames.edit', $videogame)}}>
                    Modifica
                </a>
                <form action={{route('videogames.destroy', $videogame)}} method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Elimina</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('videogames.create') }}">
        <button>Aggiungi nuovo videogame</button>
    </a>
@endsection