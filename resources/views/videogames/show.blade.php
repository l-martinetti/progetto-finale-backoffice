@extends('layouts.master')

@section('content')
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