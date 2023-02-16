<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route :: get('/', [MainController :: class , 'home'])
    -> name('home');
Route :: get ('/movies', [MainController :: class , 'movies'])
    -> name('movies');

// redirect to form for create a new movie
Route :: get('/movies/create' , [MainController :: class, 'create'])
    -> name('movie.create');
// create new film
Route :: post('/movies/create' , [MainController :: class, 'store'])
    -> name('movie.addnew');

    // redirect to edit page
Route :: get('/movies/edit/{movie}',[MainController :: class, 'edit'])
    ->name('movie.edit');