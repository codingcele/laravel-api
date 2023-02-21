<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'homeMovie']) -> name('home.movie');

Route::get('/moviesbygenre', [MainController::class, 'homeGenre']) -> name('home.genre');

Route::get('/movie/delete/{movie}', [MainController::class, 'homeDelete']) -> name('home.delete');
