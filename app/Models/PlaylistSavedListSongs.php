<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistSavedListSongs extends Model
{
    use HasFactory;

    protected $table = 'saved_list_songs';

    protected $fillable = [
       'song_id','saved_list_id'
    ];
    public $timestamps = false;

  

}
