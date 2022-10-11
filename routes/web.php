<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Post  endpoint
// Route::get('/post', [PostController::class, 'index']);
// Route::resource('post', 'PostController');
 Route::get('/genre', [App\Http\Controllers\GenreController::class, 'index']);
 Route::post('/genre', [App\Http\Controllers\GenreController::class, 'getIndex'])->name('index.store');
 Route::post('/songs', [App\Http\Controllers\SongController::class, 'getSong'])->name('song.store');



 Route::get('/songs', [App\Http\Controllers\SongController::class, 'index']);
//  Route::get('/songs', [App\Http\Controllers\GenreController::class, 'indexSong']);
Route::group(['middleware' => 'auth'], function() {

  // put routes here...
  Route::get('/playlists', [App\Http\Controllers\PlaylistController::class, 'index']);
  Route::post('/playlists', [App\Http\Controllers\PlaylistController::class, 'toDoIndex'])->name('create.store');

  Route::get('/playlist', [App\Http\Controllers\PlaylistController::class, 'index2'])->name('addSong.store');
  
  Route::get('/playlistD', [App\Http\Controllers\PlaylistController::class, 'index3'])->name('deleteSong');

  Route::get('/playlistS', [App\Http\Controllers\PlaylistController::class, 'index4'])->name('save.playlist');

  Route::post('/playlistO', [App\Http\Controllers\PlaylistController::class, 'index5'])->name('old.playlist');

  Route::post('/playlistOS', [App\Http\Controllers\PlaylistController::class, 'index6'])->name('addSongSave.store');

  Route::post('/playlistOD', [App\Http\Controllers\PlaylistController::class, 'index7'])->name('deleteSongSave');


  //  Route::post('/playlist', [App\Http\Controllers\PlaylistController::class, 'addSongs'])->name('addSong.store');

  

});

//  Route::get('view-records','StudViewController@index');

 Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
