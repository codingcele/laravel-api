@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="container d-flex justify-content-between">
            <h1>
                MOVIES:
            </h1>
            <h1>
                <a href="{{ route('home.genre') }}">Movies by genre</a>
            </h1>
        </div>
        <a href="{{ route('movie.create') }}">ADD NEW MOVIE</a>
        <ul>
            @foreach ($movies as $movie)
                @include('components.movie')
            @endforeach
        </ul>
    </div>
@endsection