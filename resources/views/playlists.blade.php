@extends('layouts.header')
@section('content')
 <div>

    <form action="{{ route('create.store') }}" method="post" style="width: 100%; height: 100px">
       {{ csrf_field() }}
       <input name="create">
        <button class="btn btn-secondary" type="submit" value=".Send " id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
            maak een playlist en pas naam aan
        </button>
   </form>
 </div>
 
@endsection('content')