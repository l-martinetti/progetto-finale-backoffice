@extends('layouts.master')

@section('content')
    @if ($console->image)
        <div id="console-image">
            <img src="{{ asset('storage/' . $console->image)}}" alt="copertina">
        </div>
    @endif
    <div>
        <p class="text-white">{{$console->name}}</p>
        <p class="text-secondary">{{$console->description}}</p>
    </div>

    <a href="{{ route('consoles.index') }}" class="text-decoration-none">
        <button class="btn btn-outline-secondary d-flex align-items-center gap-2">Torna alla lista</button>
    </a>
@endsection