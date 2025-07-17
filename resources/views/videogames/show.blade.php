@extends('layouts.master')

@section('title', $videogame->title)

@section('content')
    @if ($videogame->cover_image)
        <div id="post-image">
            <img src="{{ asset('storage/' . $videogame->cover_image)}}" alt="copertina">
        </div>
    @endif

    <div>
        <p>{{$videogame->title}}</p>
        <p>{{$videogame->description}}</p>
        <p>{{$videogame->release_date}}</p>
        <p>Console:
            @if($videogame->consoles->count() > 0)
                @foreach($videogame->consoles as $console)
                    {{ $console->name }}@if(!$loop->last), @endif
                @endforeach
            @endif
        </p>
    </div>

    <a href="{{ route('videogames.index') }}">
        <button>Torna alla lista</button>
    </a>
@endsection