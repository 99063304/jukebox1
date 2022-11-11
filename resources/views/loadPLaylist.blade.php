@extends('layouts.header')
@section('content')

 <h1>PlaylistName: @if($playlistname != '1')  {{ $playlistname->playlist_name }} @else  @endif</h1>
   <form action="{{ route('addSongSave.store') }} " method='post'>
   {{ csrf_field() }}

        <select name="addSongo" id="">

        @foreach($songs as $song_name)
            
            <option value="{{$song_name->id}}">{{ $song_name->song_name }}</option>
        @endforeach
        </select>
        <button value='{{ $playlistname->id }}' name='playlist_id' type="submit">toevoegen</button>
    </form>

    <form action="{{ route( 'deleteSongSave') }}" method='post'>
    {{ csrf_field() }}

        <select name="deleteSong">
        @foreach($allsongs as $song)

        @foreach($songs as $song_name)


        @if($song->songs_id == $song_name->id)
            <option value="{{$song_name->id}}">{{ $song_name->song_name }}</option>
        @endif

        @endforeach
        @endforeach
        </select>
    

        <input hidden name='playlist_id' value='{{$playlistname->id}}'></input>

        <button type="submit">verwijderen</button>
    </form>
<form action="{{ route('deletePlaylist') }}" method='post'>
{{ csrf_field() }}
    <input hidden name='playlist_id' value='{{$playlistname->id}}'></input>
    <button type="submit"> VERWIJDER PLAYLIST</button>
</form>

<a href="{{ route('opvragenPlaylist') }}"></a>

 
@endsection('content') 