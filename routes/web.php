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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function() {
  Route::get('/genre', [GenreController::class, 'index']);
  Route::post('/genre', [GenreController::class, 'getIndex'])->name('index.store');
  Route::get('/songs', [SongController::class, 'index']);
  Route::post('/songs', [SongController::class, 'getSong'])->name('song.store');
  Route::get('/playlists', [PlaylistController::class, 'index']);
  Route::post('/playlists', [PlaylistController::class, 'toDoIndex'])->name('create.store');
  Route::get('/playlist', [PlaylistController::class, 'index2'])->name('addSong.store');  
  Route::get('/playlistD', [PlaylistController::class, 'index3'])->name('deleteSong');
  Route::get('/playlistS', [PlaylistController::class, 'index4'])->name('save.playlist');
  Route::post('/playlistO', [PlaylistController::class, 'index5'])->name('old.playlist');
  Route::post('/playlistOS', [PlaylistController::class, 'index6'])->name('addSongSave.store');
  Route::post('/playlistOD', [PlaylistController::class, 'index7'])->name('deleteSongSave');
  Route::post('/playlistPD', [PlaylistController::class, 'index8'])->name('deletePlaylist');
  Route::get('/playlistOP', [PlaylistController::class, 'index9'])->name('opvragenPlaylist');
  Route::get('/playlistOP/{id}', [PlaylistController::class, 'index10'])->name('playlist');
});
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
