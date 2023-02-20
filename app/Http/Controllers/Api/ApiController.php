<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Tag;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function allMovies(){
        $movies = Movie :: with('genre','tag') -> paginate(3);
        return response() -> json([
            'success' => true,
            'response' => $movies
        ]);
    }
        public function storePage(){
        $genres = Genre :: all();
        $tags = Tag :: all();

        return response() -> json([
     
            'genres' => $genres,
            'tags' => $tags
        ]);
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
  
        return response()-> json([
            'response' => $movie,
            'data' => $request -> all()
        ]);
    }
}
