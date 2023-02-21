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
        <ul>
            @foreach ($movies as $movie)
                <li>
                    <h3>
                        {{ $movie -> name }}
                    </h3>
                    <h5>
                        {{ $movie -> year }}
                    </h5>
                    <h5>
                        {{ $movie -> cashOut }}
                    </h5>
                </li>
            @endforeach
        </ul>
    </div>
@endsection