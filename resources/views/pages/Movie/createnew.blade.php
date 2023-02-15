@extends('layouts.main-layout')
@section('title')
    <title>Add new movie</title>
@endsection

@section('contents')
<div class="container">
    <h2>Create new Movie:</h2>
    @if ($errors ->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                    <li> {{$error}} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('movie.addnew')}}" method="POST" class="d-flex flex-column col-4 mx-auto">
        @csrf
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Name:</span>
            <input name="name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Year:</span>
            <input name="date" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">CashOut:</span>
            <input name="cashOut" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>

        <select name="genre" class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option selected>Select genre</option>
            @foreach ($genres as $genre)
                <option name="genre" value="{{$genre -> id}}">{{$genre -> name}}</option>     
            @endforeach
          </select>
        <h3>Chose Tag:</h3>
        @foreach ($tags as $tag)
        <div class="form-check form-switch">
            <input name="tags[]" value="{{$tag -> id}}" class="form-check-input" type="checkbox" role="switch" id="tag_{{$tag->id}}">
            <label class="form-check-label" for="flexSwitchCheckDefault">{{$tag -> name}}</label>
          </div>
        @endforeach
        <div class="cmd-btn my-3 ">
            <a href="">
                <button class="btn btn-success">Add</button>
            </a>
        </div>

    </form>
</div>

@endsection