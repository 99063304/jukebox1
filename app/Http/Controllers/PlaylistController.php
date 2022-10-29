<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Playlists;
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
        $last = DB::table('saved_list')
        ->select('*')
        ->where('user_id', Auth::id())
        ->get();
        
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
        $last = DB::table('saved_list')
                ->selectRaw('id')
                ->orderByRaw('id DESC')
                ->limit(1)
                ->get();

        foreach (session::all()['SongName'] as $key) {
            PlaylistSavedListSongs::create([
                'song_id'=> $key, 
                'saved_list_id'=> $last[0]->id]);
         }
        session::flush();
        $currentURL = url()->current();
    
        $newUrl = str_replace('S', 's', $currentURL);
         return Redirect::to($newUrl);

    }
    
    public function index5 (Request $request){
        $theId = $request->all()['gekozenPlaylist'];        
        $PlaylistSavedList = DB::table('saved_list')->find($theId);
         $PlaylistSavedListSongs = DB::table('saved_list_songs')->where('saved_list_id', $theId)->get();

         
        $allSongs = DB::table('songs')->get();
       
        return view('loadPLaylist',['playlistname' => $PlaylistSavedList,'allsongs'=>$PlaylistSavedListSongs,'songs'=>$allSongs]);
  
    }
    public function index6 (Request $request){

    
        $ids = $request->all();

        PlaylistSavedListSongs::create([
            'song_id' => $ids['addSongo'],
            'saved_list_id' => $ids['playlist_id'] 
           ]);

           $currentURL = url()->current();
    
           $newUrl = str_replace('OS', 's', $currentURL);
            return Redirect::to($newUrl);
    }

    public function index7 (Request $request){
       
        $id = $request->all()['deleteSong'];
        $list_id = $request->all()['playlist_id'];
        
        DB::table('saved_list_songs')->where('saved_list_id',$list_id)->limit($id,'1')->delete();

        $currentURL = url()->current();
        $newUrl = str_replace('OD', 's', $currentURL);
        return Redirect::to($newUrl);
    }
    public function index8 (Request $request){
        $list_id = $request->all()['playlist_id'];
        DB::table('saved_list_songs')->where('saved_list_id',$list_id)->delete();
        DB::table('saved_list')->where('id',$list_id)->delete();

        $currentURL = url()->current();
        $newUrl = str_replace('PD', 's', $currentURL);
        return Redirect::to($newUrl);
 
    }
    public function index9 (){
       $lijsten =  DB::table('saved_list')->where('user_id', Auth::id());
       $lijstlieden =  DB::table('saved_list_songs')->where('saved_list_id',$list_id); 

        dd($lijsten);
    }

}
