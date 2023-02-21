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

    $movies = Movie :: with('tag') ->get();
    $genres = Genre :: all();
    $tags = Tag :: all();

    return response() -> json([
        'success' => true,
        'movies' => $movies,
        'genres' => $genres,
        'tags' => $tags
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
