<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;

class SongController extends Controller
{
    // Toon alle songs
    public function index()
    {
        $songs = Song::with('albums')->get();
        return view('songs.index', compact('songs'));
    }

    // Form voor nieuwe song
    public function create()
    {
        $albums = Album::all();
        return view('songs.create', compact('albums'));
    }

    // Opslaan nieuwe song
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'singer' => 'required|string|max:255'
        ]);

        $song = Song::create($request->only(['title', 'singer']));
        $song->albums()->sync($request->albums ?? []);

        return redirect()->route('songs.index')->with('success', 'Song toegevoegd!');
    }

    // Show een song
    public function show(Song $song)
    {
        $song->load('albums');
        return view('songs.show', compact('song'));
    }

    // Form voor bewerken
    public function edit(Song $song)
    {
        $albums = Album::all();
        $song->load('albums');
        return view('songs.edit', compact('song', 'albums'));
    }

    // Update song
    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'singer' => 'required|string|max:255'
        ]);

        $song->update($request->only(['title', 'singer']));
        $song->albums()->sync($request->albums ?? []);

        return redirect()->route('songs.index')->with('success', 'Song bijgewerkt!');
    }

    // Verwijder song
    public function destroy(Song $song)
    {
        $song->albums()->detach();
        $song->delete();

        return redirect()->route('songs.index')->with('success', 'Song verwijderd!');
    }

    public function storeFromApi(Request $request)
    {
        Song::create([
            'title' => $request->title,
            'singer' => $request->artist,
            'album_id' => null
        ]);

        return back()->with('success', 'Nummer toegevoegd!');
    }
}
