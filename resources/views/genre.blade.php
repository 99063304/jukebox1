@extends('layouts.header')

@section('content')
    @if(!isset($oneGenre))
        @foreach ($genres as $genre)
        <form action="{{ route('index.store') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="genres[]" value="{{ $genre->id }}">
            <div class="card" style="height: 200px; width: 200px">
                <div class="dropdown">
                    <button class="btn btn-secondary" type="submit" value=".Send " id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">  {{ $genre->genre_name }}</button>
                    <div class="dropdown-menu" style='position: absolute; left: 0;' aria-labelledby="dropdownMenuButton"> <a class="dropdown-item" href="#">sONG</a></div>
                </div>
            </div>
        </form>
        @endforeach
        @else()
        @foreach ($oneGenre as $song)
        <form action="{{ route('song.store') }}" method="post" style="width: 100%; height: 100px">
             {{ csrf_field() }}
            <div class="card" style="display: block; width: 100%; height: 100%">
                <input type="hidden" name="genres[]" value="{{ $song->genre_id }}">
                <button class="btn btn-secondary" type="submit" value=".Send " id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">{{ $song->song_name }}</button>
            </div>
        </form>
        @endforeach
    @endif() 
@endsection('content')
