<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\PostController;

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

Route::get('/home', [HomeController::class, 'showHome'])->name('home');

Route::group(['middleware' => 'auth'], function() {
  Route::get('/genre', [GenreController::class, 'getGenres']);
  Route::post('/genre', [GenreController::class, 'getGenre'])->name('genre');
  Route::get('/songs', [SongController::class, 'getSongs']);
  Route::post('/songs', [SongController::class, 'getSong'])->name('song.store');
  Route::get('/playlists', [PlaylistController::class, 'getOldPlaylist']);
  Route::post('/playlists', [PlaylistController::class, 'addPlaylistName'])->name('create.store');
  Route::get('/playlist', [PlaylistController::class, 'addSongs'])->name('addSong.store');  
  Route::get('/playlistDelete', [PlaylistController::class, 'deleteSong'])->name('deleteSong');
  Route::get('/playlistSave', [PlaylistController::class, 'savePlaylist'])->name('save.playlist');
  Route::post('/playlistOld', [PlaylistController::class, 'loadSavedPlaylistEdit'])->name('old.playlist');
  Route::post('/playlistOldSave', [PlaylistController::class, 'saveSongInDatabase'])->name('addSongSave.store');
  Route::post('/playlistOldDelete', [PlaylistController::class, 'deleteSongFromPlaylist'])->name('deleteSongSave');
  Route::post('/playlistPlaylistDelete', [PlaylistController::class, 'deletePlaylist'])->name('deletePlaylist');
  Route::get('/playlistOldPlaylist', [PlaylistController::class, 'getAllPlaylist'])->name('opvragenPlaylist');
  Route::get('/playlistOldPplaylist/{id}', [PlaylistController::class, 'showSelectedPlaylist'])->name('playlist');
  Route::post('/playlistUpdatePlaylist', [PlaylistController::class, 'updatePlaylistName'])->name('updatePlaylistName');
});
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
