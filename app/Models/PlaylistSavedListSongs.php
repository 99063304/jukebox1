<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistSavedListSongs extends Model
{
    use HasFactory;

    protected $table = 'playlist_saved_list_songs';

    protected $fillable = [
       'songs_id','playlist_saved_list_id'
    ];
    public $timestamps = false;

  

}
