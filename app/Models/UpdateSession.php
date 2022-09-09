<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class UpdateSession
{
  
    
    public $playlistname;
    public $gebruikerID;
    public static $songs = array();
    


        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     
    //  public function __construct($playlistname,$gebruikerID,$songs) {
    //             $this->playlistname = $playlistname;
    //             $this->gebruikerID = $gebruikerID;
    //             $this->songs = $songs;
    //         }
    
    // public function getSession(Request $request, $id)
    // { 
        
    //     $value = $request->session()->get('key');
 

    // }
    public static function addSongSession($id)
    {
        Session::put('playlistname', $id);
        // self::playlistname = $id;
     

    }
    public static function addSongsSession($id)
    {
        // session::put('playlistname', $id);
        //  self::$songs = $id;
        if(isset(Session::all()['SongName'])){
            self::$songs = Session::all()['SongName'];
        } else{
            self::$songs = array();
        } 
          array_push(self::$songs,$id);

           dd(Self::$songs);

         Session::put('SongName',[self::$songs]);


    }
    // public function deleteSongSession(Request $request, $id)
    // {
    //     $theId = $request->all();
    //     $song = Songs::find($theId['genres'][0]);
    //     return view('songs',['songs'=>$song]);

    // }

}
