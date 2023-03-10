<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;



Route::get('/v1/movie/all', [ApiController::class, 'getMovieWTagAndGenre']);

Route::post('/v1/movie/store', [ApiController :: class, 'movieStore']);

Route::get('/v1/movie/delete/{movie}', [ApiController :: class, 'movieDelete']);
