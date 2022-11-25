<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { // connects Seeders 
       $genreCount = \App\Models\Genres::count();
       $this->call( GenreSeeder::class);
       $this->callWith( SongsSeeder::class,['genreCount'=> $genreCount ]);
    }
} 
