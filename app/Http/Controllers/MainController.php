<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $genres = Genre :: all();
        // dd($genres);
        return view('pages.home',compact('genres'));
    }
    public function movies(){
        $movies = Movie :: all();

        return view('pages.movies', compact('movies'));
    }
}
