<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistSavedList extends Model
{
    use HasFactory;
    protected $table = 'saved_list';

    protected $fillable = [
       'id','playlist_name','user_id'
    ];
    public $timestamps = false;


}   
