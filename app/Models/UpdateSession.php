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

    public static function addSongSession($id)
    {
        Session::put('playlistname', $id);
    }
    public static function addSongsSession($id)
    {
        if (isset(Session::all()['SongName'])){
            self::$songs = Session::all()['SongName'];
        } 
        array_push(self::$songs,$id);
        Session::put('SongName',self::$songs);
    }
    public static function deleteSong($id){
         Session::forget('SongName.' . $id);
    }
    public static function deleteAll(){
        Session::forget('SongName');
        Session::forget('playlistname');
   }

}
