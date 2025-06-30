@extends('layouts.master')

@section('content')

    <ul>
        @foreach ($videogames as $videogame)
            <li>{{$videogame->title}}</li>
        @endforeach
    </ul>

    <a href="{{ route('videogames.create') }}">
        <button>Aggiungi nuovo videogame</button>
    </a>
@endsection