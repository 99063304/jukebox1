@extends('layouts.header')
@section('content')
 <div>
    <form action="{{ route('create.store') }}" method="post" style="width: 100%; height: 100px">
       {{ csrf_field() }}
       <input name="create">
       <button class="btn btn-secondary" type="submit" value=".Send " id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">Maak een playlist/pas naam aan</button>
    </form>
    
    <form action="{{ route('old.playlist') }}" method="post" style="width: 100%; height: 100px">
       {{ csrf_field() }}
       <select name="gekozenPlaylist" >
            @foreach ($oldPlaylists as $playlist)
                <option value="{{ $playlist->id}}">{{ $playlist->playlist_name}}</option>
            @endforeach
       </select>
        <button class="btn btn-secondary" type="submit" value=".Send " id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">Opgeslagen playlist aanpassen</button>
    </form>
    <a style="width: 100%;" class='btn btn-primary' href="{{ route('opvragenPlaylist') }}">Opvragen playlists</a>
 </div>
 
@endsection('content')