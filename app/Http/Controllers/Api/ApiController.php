<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function allMovies(){
        $movies = Movie :: with('genre','tag') -> paginate(1);
        return response() -> json([
            'data' => $movies
        ]);
    }
}
