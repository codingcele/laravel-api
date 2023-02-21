@extends('layouts.main-layout')

@section('content')
    <div class="container">
        <h1>
            ADD NEW MOVIE
        </h1>
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name">
            <br>
            <label for="year">Year</label>
            <input type="number" name="year">
            <br>
            <label for="cashOut">Cash Out</label>
            <input type="number" name="cashOut">
            <br>
            <label for="genre">Genre</label>
            <select name="genre_id">
                @foreach ($genres as $genre)
                    <option value="{{ $genre -> id }}">{{ $genre -> name }}</option>    
                @endforeach
            </select>
            <br>
            <h3>Tags</h3>
            <div class="d-flex justify-content-between flex-wrap">
                @foreach ($tags as $tag)
                    <div class="d-flex">
                        <input class="me-2" type="checkbox" name="tags[]" value="{{ $tag -> id }}">
                        <label class="me-3" for="tags">{{ $tag -> name }}</label>
                    </div>         
                @endforeach
            </div>        
            <input type="submit" value="ADD NEW MOVIE">
        </form>
    </div>
@endsection