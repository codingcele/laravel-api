@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <div class="container d-flex justify-content-between align-items-center">
            <h1>
                MOVIES BY GENRE:
            </h1>
            <h4>
                <a href="{{ route('home.movie') }}">
                    HOME
                </a>
            </h3>
        </div>
        <a href="{{ route('movie.create') }}">ADD NEW MOVIE</a>
        @foreach ($genres as $genre)
            <h3>
                {{ $genre -> name }}
            </h3>
            <ul>
                @foreach ($genre -> movies as $movie)
                    @include('components.movie')
                @endforeach
            </ul>
        @endforeach
    </div>
@endsection