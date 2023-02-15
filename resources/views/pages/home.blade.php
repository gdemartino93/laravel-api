@extends('layouts.main-layout')

@section('title')
    <title>Home Page</title>
@endsection
@section('contents')
<div class="container">
    <div class="col-6 m-auto d-flex flex-wrap">
        @foreach ($genres as $genre)
        <h3 class="text-warning">{{$genre -> name}}</h3>
            @foreach ($genre -> movies as $movie)
                <div class="myItem flex-column">
                  asd
                </div>
            @endforeach
  
        @endforeach
    </div>
</div>

@endsection

