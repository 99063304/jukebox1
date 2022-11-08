@extends('layouts.header')
@section('content')
 


<div class="card" style="width: 18rem;">
  <?php $countTime = 0; ?>
  <div class="card-body">
    @foreach($savedList as $listName => $listValue)
    <h5 class="card-title">{{$listName}}</h5>
    @foreach($listValue as $list)
  
    <p class="card-text">{{$list['song_name']}}</p>
    <?php $countTime = $countTime + $list['tijds_duur']; ?>

    @endforeach
    @endforeach

    <p>Duur:{{$countTime}}</p>

  </div>
</div>
 
    

 
@endsection('content') 