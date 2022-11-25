<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Songs;
use App\Models\UpdateSession;
use App\Models\PlaylistSavedList;
use App\Models\PlaylistSavedListSongs;
use Illuminate\Support\Facades\Redirect;


use Auth;
use Illuminate\Support\Facades\Session;

class PlaylistController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getOldPlaylist()
    {
    // fetch playlists and load view

        $last =  PlaylistSavedList::where('user_id', '=', Auth::id())->get(); 
        $oldPlaylists = '';
        if($last){
            $oldPlaylists = $last;
        }
        return view('Playlists',['oldPlaylists' => $oldPlaylists]);
    }
    public function addSongs(Request $request)
    {
    // Stores song in the session and retrieves Session and Song info and sends it to the view        
        $theid = $request->all()['addSongo'];
        UpdateSession::addSongsSession($theid);
        $allSongs = Songs::All();
        $theid = session::all();


        return view('createPlaylist',['playlistname' => '1','AllSession'=>$theid,'allsongs'=>$allSongs]);
    }

    public function addPlaylistName(Request $request)
     {  
        // Stores song with the given id and returns and returns the id with all other songs

        $theId = $request->all()['create'];
        UpdateSession::addSongSession($theId);

        $allSongs = Songs::All();
        return view('createPlaylist',['playlistname'=>$theId,'allsongs'=>$allSongs]);
    }
    public function deleteSong(Request $request){
        // removes song from session and passes the rest of the session and songs info to the view

        $theId = $request->all();
        $deleteId = $theId['deleteSong'];
        updateSession::deleteSong($deleteId);
        
        $theId = session::all();
        $allSongs = Songs::all();
        return view('createPlaylist',['playlistname' => '1','AllSession'=>$theId,'allsongs'=>$allSongs]);
    }
    public function savePlaylist(){
        // Stores playlist in database and returns the page to playlists

        PlaylistSavedList::create([

         'id' => null,
         'playlist_name' => Session::all()['playlistname'],
         'user_id'=> Auth::id()

        ]);
        $last = PlaylistSavedList::select('id')->orderBy('id', 'DESC')->first();

        foreach (session::all()['SongName'] as $key) {
            PlaylistSavedListSongs::create([
                'songs_id'=> $key, 
                'playlist_saved_list_id'=> $last->id]);
         }
         updateSession::deleteAll();

        $currentURL = url()->current();
        $newUrl = str_replace('Save', 's', $currentURL);
        return Redirect::to($newUrl);
    }
    
    public function loadSavedPlaylistEdit (Request $request){
        // retrieves all database Playlist info and the songs and passes them to the view

        $theId = $request->all()['gekozenPlaylist'];        
        $PlaylistSavedList = playlistSavedList::find($theId);
        $PlaylistSavedListSongs = playlistSavedListSongs::where('playlist_saved_list_id', $theId)->get();

        $allSongs = Songs::all();
        return view('loadPLaylist',['playlistname' => $PlaylistSavedList,'allsongs'=>$PlaylistSavedListSongs,'songs'=>$allSongs]);
    }
    public function saveSongInDatabase (Request $request){
        // Stores song in database

        $ids = $request->all();
        PlaylistSavedListSongs::create([
            'songs_id' => $ids['addSongo'],
            'playlist_saved_list_id' => $ids['playlist_id'] 
           ]);

        $currentURL = url()->current();
        $newUrl = str_replace('OldSave', 's', $currentURL);
        return Redirect::to($newUrl);
    }

    public function deleteSongFromPlaylist (Request $request){
        // Removes song from database

        $id = $request->all()['deleteSong'];
        playlistSavedListSongs::where('id',$id)->delete();

        $currentURL = url()->current();
        $newUrl = str_replace('OldDelete', 's', $currentURL);
        return Redirect::to($newUrl);
      
    }  
    public function deletePlaylist (Request $request){
        //Remove playlist from database
        $list_id = $request->all()['playlist_id'];
        playlistSavedListSongs::where('playlist_saved_list_id',$list_id)->delete();
        PlaylistSavedList::where('id',$list_id)->delete();

        $currentURL = url()->current();
        $newUrl = str_replace('PlaylistDelete', 's', $currentURL);
        return Redirect::to($newUrl);
    }
    public function getAllPlaylist(){
        // Retrieves all playlists from the database from the user

        $savedListNames = PlaylistSavedList::where('user_id', 2)->get();
        
        return view('lijstopvragen')->with('savedListNames',$savedListNames);
    }
    public function showSelectedPlaylist (Request $request){
        // Loads in specific Playlist
        $savedList = PlaylistSavedList::find($request->route('id'));
        return view('opvragen')->with('savedList',$savedList);
    }
    public function updatePlaylistName (Request $request){
        // Update PlaylistNaam
        $pname = $request->all()['pname'];
        $pid = $request->all()['pid'];
        playlistSavedList::where('id',$pid)->update(['playlist_name' => $pname]);


        $currentURL = url()->current();
        $newUrl = str_replace('UpdatePlaylist', 's', $currentURL);
        return Redirect::to($newUrl);
    }
}
