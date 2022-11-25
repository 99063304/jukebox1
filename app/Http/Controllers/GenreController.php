<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function getSongs()
    { // gets all genre info en gives it to vie
        $genres = Genres::all(); 
        return view('genre',['genres'=>$genres]);
    }
    public function getSong(Request $request)
    { // gets specific genre and gives it to view
        $theId = $request->all()['genres'][0];
        $song = Songs::where('genre_id', $theId)->get();
        return view('genre',['oneGenre'=>$song]);
    }
    
    
}
 