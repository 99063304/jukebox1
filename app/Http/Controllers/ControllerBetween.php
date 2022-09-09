<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ControllerBetween extends Controller
{
    public $playlistname;
    public $gebruikerID;
    public $songs;



        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     
     public function __construct($playlistname,$gebruikerID,$songs) {
                $this->playlistname = $playlistname;
                $this->gebruikerID = $gebruikerID;
                $this->songs = $songs;
            }
    
    // public function getSession(Request $request, $id)
    // { 
        
    //     $value = $request->session()->get('key');
 

    // }
    public function addSongSession($id)
    {
        session::put('playlistname', $id);
        $this->playlistname = $id;

    }
    // public function deleteSongSession(Request $request, $id)
    // {
    //     $theId = $request->all();
    //     $song = Songs::find($theId['genres'][0]);
    //     return view('songs',['songs'=>$song]);

    // }

}
 