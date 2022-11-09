<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;




class SongsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($genreCount)
    {
       
       
        

       for($i = 0; $i <= 5; $i++){
        DB::table('songs')->insert([
            'id' => null,
            'song_name' => Str::random(10),
            'genre_id' => rand(1,$genreCount),
            'tijds_duur' => rand(1,5),
        ]);
       }

        
    }
}
