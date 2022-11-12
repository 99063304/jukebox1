<?php

namespace App\Http\Controllers;
use DB;
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
    public function index()
    {
        $last =  PlaylistSavedList::where('user_id', '=', Auth::id())->get(); 
        //DB::table('playlist_saved_list')
        //->select('*')
        //->where('user_id', Auth::id())
        //->get();
        
        $oldPlaylists = '';
        if($last){
            $oldPlaylists = $last;
        }
        return view('Playlists',['oldPlaylists' => $oldPlaylists]);
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
    public function index4(){
        PlaylistSavedList::create([

         'id' => null,
         'playlist_name' => Session::all()['playlistname'],
         'user_id'=> Auth::id()

        ]);
        $last = PlaylistSavedList::select('id')->orderBy('id', 'DESC')->first();
        
        //DB::table('playlist_saved_list')
          //      ->selectRaw('id')
            //    ->orderByRaw('id DESC')
              //  ->limit(1)
                //->get();

      

        foreach (session::all()['SongName'] as $key) {
            PlaylistSavedListSongs::create([
                'songs_id'=> $key, 
                'playlist_saved_list_id'=> $last->id]);
         }
        session::flush();

        $currentURL = url()->current();
        $newUrl = str_replace('S', 's', $currentURL);
        return Redirect::to($newUrl);
    }
    
    public function index5 (Request $request){
        $theId = $request->all()['gekozenPlaylist'];        
        $PlaylistSavedList = playlistSavedList::find($theId);
        $PlaylistSavedListSongs = playlistSavedListSongs::where('playlist_saved_list_id', $theId)->get();

        $allSongs = Songs::all();
        return view('loadPLaylist',['playlistname' => $PlaylistSavedList,'allsongs'=>$PlaylistSavedListSongs,'songs'=>$allSongs]);
    }
    public function index6 (Request $request){
        $ids = $request->all();
        PlaylistSavedListSongs::create([
            'songs_id' => $ids['addSongo'],
            'playlist_saved_list_id' => $ids['playlist_id'] 
           ]);

        $currentURL = url()->current();
        $newUrl = str_replace('OS', 's', $currentURL);
        return Redirect::to($newUrl);
    }

    public function index7 (Request $request){
        $id = $request->all()['deleteSong'];

        
       // $list_id = $request->all()['playlist_id'];


        //dd($gg);
         playlistSavedListSongs::where('id',$id)->delete();

        $currentURL = url()->current();
        $newUrl = str_replace('OD', 's', $currentURL);
        return Redirect::to($newUrl);
    }
    public function index8 (Request $request){
        $list_id = $request->all()['playlist_id'];
        playlistSavedListSongs::where('playlist_saved_list_id',$list_id)->delete();
        PlaylistSavedList::where('id',$list_id)->delete();

        $currentURL = url()->current();
        $newUrl = str_replace('PD', 's', $currentURL);
        return Redirect::to($newUrl);
    }
    public function index9(){
        $savedListNames = PlaylistSavedList::all();
        return view('lijstopvragen')->with('savedListNames',$savedListNames);
    }
    public function index10 (Request $request){
        $savedList = PlaylistSavedList::find($request->route('id'));
        return view('opvragen')->with('savedList',$savedList);
    }
}
