@extends('layouts.header')
@section('content')
 
<!-- Loads a playlist from database -->

<div class="card" style="width: 18rem;">
  <?php $countTime = 0; ?>
  <div class="card-body">
    <h5 class="card-title">{{$savedList['playlist_name']}}</h5>
    @foreach($savedList->songs as $listName)
      <p class="card-text">{{$listName['band_name']}} - {{$listName['song_name']}} - {{$listName['tijds_duur']}}m</p>
      <?php $countTime = $countTime + $listName['tijds_duur']; ?>
    @endforeach
    <p>Totaal Duur:{{$countTime}} M</p>
  </div>
</div>
 

    
@endsection('content') 