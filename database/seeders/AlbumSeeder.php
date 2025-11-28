<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;

class AlbumSeeder extends Seeder
{
    public function run()
    {
        Album::create([
            'name' => 'Master of Puppets',
            'year' => 1986,
            'times_sold' => 1000000,
            'band_id' => 1,
        ]);

        Album::create([
            'name' => 'Nevermind',
            'year' => 1991,
            'times_sold' => 3000000,
            'band_id' => 2,
        ]);

        Album::create([
            'name' => 'The Dark Side of the Moon',
            'year' => 1973,
            'times_sold' => 45000000,
            'band_id' => 3,
        ]);
    }
}
