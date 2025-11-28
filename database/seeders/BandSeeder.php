<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Band;

class BandSeeder extends Seeder
{
    public function run(): void
    {
        Band::create(['name'=>'The Rolling Stones','genre'=>'Rock','founded'=>1962]);
        Band::create(['name'=>'Metallica','genre'=>'Metal','founded'=>1981]);
        Band::create(['name'=>'Coldplay','genre'=>'Pop','founded'=>1996]);
    }
}
