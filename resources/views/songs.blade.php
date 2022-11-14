@extends('layouts.header')

@section('content')
@if(isset($songs))
 <div>
   <p>Songname: {{ $songs->song_name }}</p>
   <p>Tijdsduur: {{ $songs->tijds_duur}}</p> 
 </div>
 @else
 @foreach($allSongs as $oneSong)
  <form action="{{ route('song.store') }}" method="post" style="width: 100%; height: 100px">
       {{ csrf_field() }}  
      <div class="card" style="display: block; width: 100%; height: 100%">
         <input type="hidden" name="genres[]" value="{{ $oneSong->genre_id }}">
         <button class="btn btn-secondary" type="submit" value=".Send " id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">{{$oneSong->song_name}}</button>
      </div>
  </form>
  @endforeach
 @endif

@endsection('content')