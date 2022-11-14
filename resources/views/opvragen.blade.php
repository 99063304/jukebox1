@extends('layouts.header')
@section('content')
 


<div class="card" style="width: 18rem;">
  <?php $countTime = 0; ?>
  <div class="card-body">
    <h5 class="card-title">{{$savedList['playlist_name']}}</h5>
    @foreach($savedList->songs as $listName)
      <p class="card-text">{{$listName['song_name']}}</p>
      <?php $countTime = $countTime + $listName['tijds_duur']; ?>
    @endforeach
    <p>Duur:{{$countTime}}</p>
  </div>
</div>
 

    
@endsection('content') 