@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <h1>
            MODIFY MOVIE
        </h1>
        <form action="{{ route('movie.update', $movie) }}" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $movie -> name }}">
            <br>
            <label for="year">Year</label>
            <input type="number" name="year" value="{{ $movie -> year }}">
            <br>
            <label for="cashOut">Cash Out</label>
            <input type="number" name="cashOut" value="{{ $movie -> cashOut }}">
            <br>
            <label for="genre">Genre</label>
            <select name="genre_id">
                @foreach ($genres as $genre)
                    <option value="{{ $genre -> id }}"
                        @if ($movie -> genre_id == $genre -> id)
                            selected
                        @endif>{{ $genre -> name }}</option>    
                @endforeach
            </select>
            <br>
            <h3>Tags</h3>
            <div class="d-flex justify-content-between flex-wrap">
                @foreach ($tags as $tag)
                    <div class="d-flex">
                        <input class="me-2" type="checkbox" name="tags[]" value="{{ $tag -> id }}"
                            @foreach ($movie -> tags as $movieTag)
                                @if ($movieTag -> id == $tag -> id)
                                    checked
                                @endif
                            @endforeach>
                        <label class="me-3" for="tags">{{ $tag -> name }}</label>
                    </div>         
                @endforeach
            </div>        
            <input type="submit" value="UPDATE MOVIE">
        </form>
    </div>
@endsection