<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;
use App\Models\Band;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->q ?? '';
        $type = $request->type ?? 'songs'; // songs, albums of bands
        $results = [];

        if ($query) {
            if ($type === 'songs') {
                $response = Http::withoutVerifying()->get("https://api.deezer.com/search", ['q' => $query]);
                $results = $response->json()['data'] ?? [];
            } elseif ($type === 'albums') {
                $response = Http::withoutVerifying()->get("https://api.deezer.com/search/album", ['q' => $query]);
                $results = $response->json()['data'] ?? [];
            } elseif ($type === 'bands') {
                $response = Http::withoutVerifying()->get("https://api.deezer.com/search/artist", ['q' => $query]);
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

        return response()->json(['message' => "✅ Song toegevoegd: {$song->title}"]);
    }

    public function addAlbum(Request $request)
    {
        $album = Album::firstOrCreate([
            'name' => $request->title,
            'year' => $request->year ?? null,
        ]);

        return response()->json(['message' => "✅ Album toegevoegd: {$album->name}"]);
    }

    public function addBand(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
        ]);

        $band = Band::firstOrCreate(
            ['name' => $request->name]
        );

        return response()->json(['message' => '✅ Band toegevoegd: ' . $band->name]);
    }
}
