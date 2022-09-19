<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Playlists;
use Illuminate\Http\Request;
use App\Models\Songs;
use App\Models\UpdateSession;


use Illuminate\Support\Facades\Session;

class PlaylistController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     
        return view('Playlists');
    }
    public function index2(Request $request)
    {

        $theid = $request->all()['addSongo'];
        UpdateSession::addSongsSession($theid);
        $allSongs = Songs::All();
        $theid = session::all(); 

        return view('createPlaylist',['playlistname' => '1','AllSession'=>$theid,'allsongs'=>$allSongs]);

   
    }

    public function toDoIndex(Request $request)
     {  
         
        $theId = $request->all()['create'];
        UpdateSession::addSongSession($theId);


    

        $allSongs = Songs::All();


        return view('createPlaylist',['playlistname'=>$theId,'allsongs'=>$allSongs]);
    }
    public function index3(Request $request){
        $theId = $request->all();
        $deleteId = $theId['deleteSong'];
        $theId = session::all();
        updateSession::deleteSong($deleteId);

        $allSongs = Songs::all();


        return view('createPlaylist',['playlistname' => '1','AllSession'=>$theId,'allsongs'=>$allSongs]);
    }

}
