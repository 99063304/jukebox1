@extends('layouts.header') 
@section('content')
 <div>
  {{ request->session()->all() }}

 </div>
 
@endsection('content')