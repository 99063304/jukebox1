<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistSavedList extends Model
{ 
    use HasFactory;
    // Defines Database table
    protected $table = 'playlist_saved_list';
    // Makes it possible to fill these columns
    protected $fillable = [
       'id','playlist_name','user_id'
    ];
    public $timestamps = false;

    // Defines relationship
    public function songs(){
        return $this->belongsToMany(Songs::class);
    }

}   
