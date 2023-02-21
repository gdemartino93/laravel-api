<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date',
        'cashOut'
    ];
    public function tag(){
        return $this-> belongsToMany(Tag :: class);
    }
    public function genre(){
        return $this-> belongsTo(Genre :: class);
    }
}
