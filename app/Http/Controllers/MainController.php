<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Genre;

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
}
