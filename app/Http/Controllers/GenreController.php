<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Genres;

class GenreController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $genres = Genres::All();
        // dd($genres); 
        return view('genre',['genres'=>$genres]);
    }
    public function getIndex(Request $request)
    {
        $oneGenre = $request->all();
        // return $request->all();
         return view('genre',['oneGenre'=>$oneGenre]);

    }
    // public function index2(Request $request)
    // {
    
    //     return $request->all();
    //     // dd($request); 
    // }
}
