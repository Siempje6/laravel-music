<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Song;
use App\Models\Band;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        $albums = Album::where('name', 'LIKE', "%$q%")->get();
        $songs = Song::where('title', 'LIKE', "%$q%")->get();
        $bands = Band::where('name', 'LIKE', "%$q%")->get();

        return view('search.results', compact('q', 'albums', 'songs', 'bands'));
    }
}
