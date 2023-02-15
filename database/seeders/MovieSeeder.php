<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie :: factory() -> count(20) -> make() -> each(function($p){
            $genre = Genre :: inRandomOrder() -> first();
            $p -> genre() -> associate($genre);
            $p -> save();

            $tag = Tag :: inRandomOrder() -> limit(2) -> get();
            $p -> tag() -> attach($tag);
        });
    }
}
