@extends('layouts.header')
@section('content')
 
<!-- Loads all playlist En redirect to specific one -->
@foreach($savedListNames as $listName => $listValue)
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a style="width: 100%;" class='btn btn-primary' href="{{ route('playlist',$listValue['id']) }}">{{$listValue['playlist_name']}}</a>
  </div>  
</div>
@endforeach


@endsection('content') 