<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Tag;
use Illuminate\Http\Request;

class ApiController extends Controller
{
   public function index(){

    $movies = Movie :: with('tag') -> orderBy('created_at','DESC') ->get();
    $genres = Genre :: all();
    $tags = Tag :: all();

    return response() -> json([
        'success' => true,
        'movies' => $movies,
        'genres' => $genres,
        'tags' => $tags
    ]);
   }
   public function store(Request $request){
    $data = $request -> validate([
        'name' => 'unique:movies|required|max:32',
        'date' => 'required|integer',
        'cashOut' => 'required',
        'genre_id' => 'required',
        'tags_id' => 'required|array'
    ]);
    $genre = Genre :: find($data['genre_id']);
    $movie = Movie :: make($data);

    $movie -> genre() -> associate($genre);
    $movie -> save();

    return response() -> json([
        'success' => true,
        'response' => $movie,
        'data' => $request -> all()
    ]);
   }

   public function delete(Movie $movie){

    $movie ->tag()->sync([]);
    $movie-> delete();

    return response() ->json([
        'success' => true
    ]);
}
        

}
