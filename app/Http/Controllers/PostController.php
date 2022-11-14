<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts/index');
    }
    public function addSongs(Request $request){
    
         return view('playlist');
        }
}
