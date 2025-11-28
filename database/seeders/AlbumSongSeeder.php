<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;

class AlbumSongSeeder extends Seeder
{
    public function run()
    {
        $album1 = Album::find(1);
        $album1->songs()->attach([1, 2]);

        $album2 = Album::find(2);
        $album2->songs()->attach([3, 4]);

        $album3 = Album::find(3);
        $album3->songs()->attach([5, 6]);
    }
}
