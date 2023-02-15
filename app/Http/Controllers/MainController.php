<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Tag;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $genres = Genre :: all();
        // dd($genres);
        return view('pages.home',compact('genres'));
    }
    // redirect to movies list
    public function movies(){
        $movies = Movie :: all();

        return view('pages.movies', compact('movies'));
    }
    // redirect to form for create new movie
    public function create(){
        $genres = Genre :: all();
        $tags = Tag :: all();
        return view('pages.movie.createnew',compact('genres','tags'));

    }
}
