<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Band;
use App\Models\Album;
use App\Models\Song;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'latestUsers' => User::latest()->take(5)->get(),
            'latestBands' => Band::latest()->take(5)->get(),
            'latestAlbums' => Album::latest()->take(5)->get(),
            'latestSongs' => Song::latest()->take(5)->get(),
        ]);
    }
}
