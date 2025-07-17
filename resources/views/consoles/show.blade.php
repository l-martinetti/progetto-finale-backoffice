@extends('layouts.master')

@section('content')
    @if ($console->image)
        <div id="console-image">
            <img src="{{ asset('storage/' . $console->image)}}" alt="copertina">
        </div>
    @endif
    <div>
        <p>{{$console->name}}</p>
    </div>

    <a href="{{ route('consoles.index') }}">
        <button>Torna alla lista</button>
    </a>
@endsection