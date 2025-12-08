<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    // API credentials
    private $apiKey = '39ad6431d1b7bd56902f836ac411e0d9';
    private $apiSecret = '02551e76d8ae19f981fac990f373767f';

    public function index(Request $request)
    {
        $query = $request->q ?? '';
        $type = $request->type ?? 'songs'; // songs of albums

        $results = [];

        if($query) {
            if($type === 'songs') {
                $response = Http::get("https://api.deezer.com/search", [
                    'q' => $query
                ]);
                $results = $response->json()['data'] ?? [];
            } else if($type === 'albums') {
                $response = Http::get("https://api.deezer.com/search/album", [
                    'q' => $query
                ]);
                $results = $response->json()['data'] ?? [];
            }
        }

        return view('search.index', compact('results', 'query', 'type'));
    }

    public function addSong(Request $request)
    {
        $song = Song::create([
            'title' => $request->title,
            'singer' => $request->artist,
            'user_id' => auth()->id()
        ]);

        return response()->json(['message' => '✅ Song toegevoegd: ' . $song->title]);
    }

    public function addAlbum(Request $request)
    {
        $album = Album::firstOrCreate([
            'name' => $request->title,
            'year' => $request->year ?? null,
        ]);

        return response()->json(['message' => '✅ Album toegevoegd: ' . $album->name]);
    }
}
