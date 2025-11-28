<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Song;

class SongSeeder extends Seeder
{
    public function run()
    {
        Song::create(['title' => 'Battery', 'singer' => 'James Hetfield']);
        Song::create(['title' => 'Enter Sandman', 'singer' => 'James Hetfield']);
        Song::create(['title' => 'Smells Like Teen Spirit', 'singer' => 'Kurt Cobain']);
        Song::create(['title' => 'Come As You Are', 'singer' => 'Kurt Cobain']);
        Song::create(['title' => 'Time', 'singer' => 'David Gilmour']);
        Song::create(['title' => 'Money', 'singer' => 'David Gilmour']);
    }
}
