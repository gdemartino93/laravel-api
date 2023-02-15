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
                    <h3 class="fw-bold">{{$movie -> name}}</h3>
                    <div>
                        <span class="fw-bold text-info">Cashout:</span>
                        <span>{{number_format($movie -> cashOut,0,'.')}} &euro;</span>
                    </div>
                    <div>
                        <span class="fw-bold text-info">Year:</span>
                        <span>{{$movie -> date}} </span>
                    </div>
                </div>
            @endforeach
  
        @endforeach
    </div>
</div>

@endsection

