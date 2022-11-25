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
        // makes seeder
       
       for($i = 0; $i <= 100; $i++){
        $rand = rand(2,$genreCount+1);
            DB::table('songs')->insert([
                'id' => null,
                'song_name' => Str::random(10),
                'band_name' => Str::random(6),
                'genre_id' => $rand,
                'tijds_duur' => rand(1,5),
            ]);
       }

        
    }
}
