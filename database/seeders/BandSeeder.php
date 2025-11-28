<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Band;

class BandSeeder extends Seeder
{
    public function run()
    {
        Band::create([
            'name' => 'Metallica',
            'genre' => 'Heavy Metal',
            'founded' => 1981,
            'active_till' => 2025, // Gebruik huidig jaar voor actieve bands
        ]);

        Band::create([
            'name' => 'Nirvana',
            'genre' => 'Grunge',
            'founded' => 1987,
            'active_till' => 1994,
        ]);

        Band::create([
            'name' => 'Pink Floyd',
            'genre' => 'Progressive Rock',
            'founded' => 1965,
            'active_till' => 1995,
        ]);
    }
}
