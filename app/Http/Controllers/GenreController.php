<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Genres;
use App\Models\Songs;

class GenreController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $genres = Genres::all();

         
        return view('genre',['genres'=>$genres]);
    }
    public function getIndex(Request $request)
    {
     //   dd('____________________');
     //   $theId = $request->all()['genres'][0];
     //   $song = Songs::where('genre_id', $theId)->get();
     //   return view('genre',['oneGenre'=>$song]);
    }
}
 