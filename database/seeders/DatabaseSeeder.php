<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BandSeeder::class,
            AlbumSeeder::class,
            SongSeeder::class,
            AlbumSongSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
