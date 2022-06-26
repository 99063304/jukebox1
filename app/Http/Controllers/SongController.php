<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Songs;

class SongController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('songs');
    }
    public function getSong(Request $request)
    {
        $theId = $request->all();
        // dd($theId['genres'][0]);
        $theId = $theId['genres'][0];
         $song = Songs::where('id', $theId)->get();
        return view('songs',['songs'=>$song]);

    }
}
