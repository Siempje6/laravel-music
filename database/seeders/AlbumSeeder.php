<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;

class AlbumSeeder extends Seeder
{
    public function run(): void
    {
        Album::create(['name'=>'Let It Bleed','year'=>1969,'times_sold'=>15000000]);
        Album::create(['name'=>'Master of Puppets','year'=>1986,'times_sold'=>6000000]);
        Album::create(['name'=>'Parachutes','year'=>2000,'times_sold'=>10000000]);
        Album::create(['name'=>'A Rush of Blood to the Head','year'=>2002,'times_sold'=>8000000]);
        Album::create(['name'=>'Ride the Lightning','year'=>1984,'times_sold'=>5000000]);
    }
}
