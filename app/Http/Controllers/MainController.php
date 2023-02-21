<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\Tag;

class MainController extends Controller
{
    public function homeMovie() {

        $movies = Movie :: all();

        return view('pages.homeMovie', compact('movies'));

    }

    public function homeGenre() {

        $genres = Genre :: all();

        return view('pages.homeGenre', compact('genres'));

    }

    public function homeDelete(Movie $movie) {

        $movie -> tags() -> sync([]);

        $movie -> delete();

        return back();

    }
    public function movieCreate() {

        $genres = Genre::all();
        $tags = Tag::all();

        return view('pages.create', compact('genres', 'tags'));

    }

    public function productStore(Request $request) {

        $data = $request -> validate([
            'name' => 'required|string|max:64',
            'year' => 'required|integer',
            'cashOut' => 'required|integer',
            'genre_id' => 'required|integer',
            'tags' => 'required|array',
        ]);



        $movie = Movie :: make($data);

        $genre = Genre :: find($data['genre_id']);

        $movie -> genre() -> associate($genre);
        $movie -> save();
        
        $tags = Tag :: find($data['tags']);
        $movie -> tags() -> attach($tags);

        return redirect() -> route('home.movie');

    }
}
