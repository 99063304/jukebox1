@extends('layouts.header')
@section('content')
 


<div class="card" style="width: 18rem;">
  <div class="card-body">
    @foreach($savedList as $listName => $listValue)
    <a style="width: 100%;" class='btn btn-primary' href="{{ route('opvragenPlaylist') }}"></a>
    @endforeach
 </div>
</div>
 
    

 
@endsection('content') 