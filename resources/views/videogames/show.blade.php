@extends('layouts.master')

@section('content')
    <div>
        <p>{{$videogame->title}}</p>
        <p>{{$videogame->description}}</p>
        <p>{{$videogame->release_date}}</p>
    </div>
@endsection