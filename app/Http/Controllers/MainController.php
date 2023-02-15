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
    public function store(Request $request){
        $data = $request -> validate([
            'name' => 'required|max:32',
            'date' => 'required',
            'cashOut' => 'required',
            'genre' => 'required',
            'tags' => 'required|array'
        ]);
        

        $movie = Movie:: make($data);

        $genre = Genre:: find($data['genre']);
 
        $movie -> genre()-> associate($genre);

        $movie-> save();
  
        return redirect()-> route('home');
    }
}
