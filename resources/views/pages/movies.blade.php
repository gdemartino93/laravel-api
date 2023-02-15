@extends('layouts.main-layout')

@section('title')
    <title> Movies List</title>
@endsection

@section('contents')
    <div class="container">
        <div class="col-6 m-auto d-flex flex-wrap">
            @foreach ($movies as $movie)
                <article class="myItem d-flex flex-column">
                    <h3 class="fw-bold">{{$movie -> name}}</h3>  
                    <div>
                        <span class="fw-bold text-info">Description:</span>
                        <span>{{$movie -> cashOut}}</span>
                    </div>
                    <div>
                        <span class="fw-bold text-info">Price:</span>
                        <span>{{$movie -> date}} &euro;</span>
                    </div>
                    <div>
                        <span class="fw-bold text-info">Genre:</span>
                        <span>{{$movie -> genre -> name}} &euro;</span>
                    </div>
                </article> 
            @endforeach
@endsection