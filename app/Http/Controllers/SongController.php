<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Songs;
use Illuminate\Support\Facades\Session;

class SongController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getSongs()
    { 
      // Gets all songs en gives them to the view
      $allSongs = Songs::All();
        return view('songs', ['allSongs'=> $allSongs]);
    }
    public function getSong(Request $request)
    {
      // Gets Specific song en gives them to the view
        $theId = $request->all();
        $song = Songs::find($theId['genres'][0]);
        
        return view('songs',['songs'=>$song]);

    }
}
