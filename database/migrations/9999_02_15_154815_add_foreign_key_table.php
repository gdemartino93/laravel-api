<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema :: table('genres', function(Blueprint $table){
            $table -> foreignId('movie_id') -> constrained();
        });

        Schema :: table('movie_tag', function(Blueprint $table){
            $table -> foreignId('movie_id') -> constrained();
            $table -> foreignId('tag_id') -> constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
