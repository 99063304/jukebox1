<?php

use Illuminate\Support\Facades\Route;
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

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Post  endpoint
// Route::get('/post', [PostController::class, 'index']);
// Route::resource('post', 'PostController');
 Route::get('/genre', [App\Http\Controllers\GenreController::class, 'index']);
 Route::post('/genre', [App\Http\Controllers\GenreController::class, 'getIndex'])->name('index.store');

 Route::get('/songs', [App\Http\Controllers\SongController::class, 'index']);
 Route::get('/playlists', [App\Http\Controllers\PlaylistController::class, 'index']);
//  Route::get('view-records','StudViewController@index');
