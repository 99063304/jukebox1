<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Playlists;
use Illuminate\Http\Request;
use App\Models\Songs;
use UpdateSession;

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

        
        // $someVariable = Input::get("some_variable");
        // $someVariable = 2;

        // $result = DB::select( DB::raw("SELECT * FROM saved_list WHERE user_id = :somevariable"), array(
        //    'somevariable' => $someVariable,
        //  ));

        //  var_dump($result);


        // return view('Playlists', ['results'=> [$result]]);
    }
    public function index2(Request $request)
    {
        // if (!Session::has('SongName')){
        //     Session::put('SongName',[$request->all()['addSongo']]);
        // } else{
        //             // dd(Session::all());
        //     session::push('SongName',$request->all()['addSongo']);
        //  }
        //  dd(Session::all());


        return view('playlist');
    }

    public function toDoIndex(Request $request)
     {  

        $theId = $request->all()['create'];
        $theSession->addSongSession($theId);

        // dd(session()->all());

        $allSongs = Songs::All();


        return view('createPlaylist',['playlistname'=>$theId,'allsongs'=>$allSongs]);
    }

}
