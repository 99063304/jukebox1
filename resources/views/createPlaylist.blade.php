@extends('layouts.header')
@section('content')
<!-- Loads Forms for adding songs en deleting songs en playlist in session and saving playlist to database -->
 <h1>PlaylistName: @if($playlistname != '1')  {{ $playlistname }}@else {{ $AllSession['playlistname'] }} @endif</h1>
 <form action="{{ route('addSong.store') }} ">
  {{ csrf_field() }}
    <select name="addSongo" id="cars">
      @foreach($allsongs as $song)
      <option value="{{$song->id}}">{{$song->song_name}}</option>
      @endforeach
    </select>
    <button class="btn btn-secondary" type="submit" value=".Send " id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">Toevoegen</button> 
 </form>
  @if($playlistname == '1')
 <form action="{{ route('deleteSong') }} ">
    {{ csrf_field() }}
    <select name="deleteSong" id="cars">
      @foreach($AllSession['SongName'] as $song => $value) 
        @foreach($allsongs as $songs)
          @if($songs['id'] == $value)
          <option value="{{$song}}"> {{ $songs['song_name']  }} </option>
          @endif
        @endforeach
      @endforeach
    </select>
    <button type="submit">Verwijderen uit playlist</button>
  </form>
  <form action="{{ route('save.playlist') }} ">
    <button type="submit">Save</button>
  </form>
    @endif

 
 
 
@endsection('content')