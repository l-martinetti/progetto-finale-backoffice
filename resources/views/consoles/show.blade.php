@extends('layouts.master')

@section('content')
    <div>
        <p>{{$console->name}}</p>
    </div>

    <a href="{{ route('consoles.index') }}">
        <button>Torna alla lista</button>
    </a>
@endsection