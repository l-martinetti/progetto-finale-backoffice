@extends('layouts.app')

@section('title', $videogame->title)

@section('content')
    <div class="container mt-3">

        @if ($videogame->cover_image)
            <div id="videogame-image">
                <img src="{{ asset('storage/' . $videogame->cover_image)}}" alt="copertina">
            </div>
        @endif

        <div>
            <p class="text-white">{{$videogame->title}}</p>
            <p class="text-secondary">{{$videogame->description}}</p>
            <p class="text-secondary">{{$videogame->release_date}}</p>
            <p class="text-secondary">Console:
                @if($videogame->consoles->count() > 0)
                    @foreach($videogame->consoles as $console)
                        {{ $console->name }}@if(!$loop->last), @endif
                    @endforeach
                @endif
            </p>
        </div>

        <a href="{{ route('videogames.index') }}" class="text-decoration-none">
            <button class="btn btn-outline-secondary d-flex align-items-center gap-2">Torna alla lista</button>
        </a>
    </div>
@endsection