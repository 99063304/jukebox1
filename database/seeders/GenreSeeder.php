<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { // makes Seeder
        
       // ma

         DB::table('genres')->insert([
            'id' => null,
            'genre_name' => Str::random(10),
        ]);
    }
}
