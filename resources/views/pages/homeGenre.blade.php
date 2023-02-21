@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <h1>
            MOVIES BY GENRE:
        </h1>
        @foreach ($genres as $genre)
            <h3>
                {{ $genre -> name }}
            </h3>
            <ul>
                @foreach ($genre -> movies as $movie)
                    <li>
                        <h4>
                            {{ $movie -> name }}
                        </h4>
                        <h5>
                            {{ $movie -> year }}
                        </h5>
                        <h5>
                            {{ $movie -> cashOut }}
                        </h5>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>
@endsection