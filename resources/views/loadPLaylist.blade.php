@extends('layouts.header')
@section('content')
   <form action="{{ route('updatePlaylistName') }} " method='post'>
   {{ csrf_field() }}
    <h1>PlaylistName:</h1>
        @if($playlistname != '1')    
        <input type="text" name="pname" value="{{ $playlistname->playlist_name }}"><br><br>
        @endif
        <button name='pid' value='{{ $playlistname->id }}' type="submit">Playlistnaam Aanpassen</button>
   </form><br>
   <form action="{{ route('addSongSave.store') }} " method='post'>
        {{ csrf_field() }}
        <select name="addSongo">
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
                        <option value="{{$song->id}}">{{ $song_name->song_name }}</option>
                    @endif
                @endforeach
            @endforeach
        </select>
        <button type="submit">verwijderen</button>
    </form>
    <form action="{{ route('deletePlaylist') }}" method='post'>
        {{ csrf_field() }}
        <input hidden name='playlist_id' value='{{$playlistname->id}}'></input>
        <button type="submit"> VERWIJDER PLAYLIST</button>
    </form>
    <a href="{{ route('opvragenPlaylist') }}"></a>
@endsection('content')
