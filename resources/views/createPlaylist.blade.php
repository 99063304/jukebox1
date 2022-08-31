@extends('layouts.header')
@section('content')
 <div>

 </div>
 <h1>PlaylistName: {{$playlistname}}</h1>
 <form action="{{ route('addSong.store') }} ">
 {{ csrf_field() }}
 <select name="addSongo" id="cars">

 @foreach($allsongs as $song)
  <option value="{{$song->id}}">{{$song->song_name}}</option>
  @endforeach

</select>
<button class="btn btn-secondary" type="submit" value=".Send " id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">Toevoegen</button>

 </form>
 
@endsection('content')