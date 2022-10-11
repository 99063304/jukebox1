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
    <?php $count = 0;?>
        <select name="deleteSong" id="">
        @foreach($allsongs as $song)

        @foreach($songs as $song_name)

        @if($song->song_id == $song_name->id)
         
            <option value="{{$count}}">{{ $song_name->song_name }}</option>
            <?php $count++; ?>
        @endif
        @endforeach

        @endforeach
        </select>
        <button type="submit">verwijderen</button>
    </form>

 
@endsection('content') 