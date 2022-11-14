@extends('layouts.header')
@section('content')
 

@foreach($savedListNames as $listName => $listValue)
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a style="width: 100%;" class='btn btn-primary' href="{{ route('playlist',$listValue['id']) }}">{{$listValue['playlist_name']}}</a>
  </div>
</div>
@endforeach


@endsection('content') 