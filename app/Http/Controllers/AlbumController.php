<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Band;
use App\Models\Song;

class AlbumController extends Controller
{
    // Toon alle albums
    public function index()
    {
        $albums = Album::with('band', 'songs')->get();
        return view('albums.index', compact('albums'));
    }

    // Form voor nieuw album
    public function create()
    {
        $bands = Band::all();
        $songs = Song::all();
        return view('albums.create', compact('bands','songs'));
    }

    // Opslaan nieuw album
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'times_sold' => 'required|integer',
            'band_id' => 'required|exists:bands,id'
        ]);

        $album = Album::create($request->only(['name','year','times_sold','band_id']));
        $album->songs()->sync($request->songs ?? []);

        return redirect()->route('albums.index')->with('success', 'Album toegevoegd!');
    }

    // Show een album
    public function show(Album $album)
    {
        $album->load('band', 'songs');
        return view('albums.show', compact('album'));
    }

    // Form voor bewerken
    public function edit(Album $album)
    {
        $bands = Band::all();
        $songs = Song::all();
        $album->load('songs');
        return view('albums.edit', compact('album','bands','songs'));
    }

    // Update album
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'times_sold' => 'required|integer',
            'band_id' => 'required|exists:bands,id'
        ]);

        $album->update($request->only(['name','year','times_sold','band_id']));
        $album->songs()->sync($request->songs ?? []);

        return redirect()->route('albums.index')->with('success', 'Album bijgewerkt!');
    }

    // Verwijder album
    public function destroy(Album $album)
    {
        $album->songs()->detach();
        $album->delete();

        return redirect()->route('albums.index')->with('success', 'Album verwijderd!');
    }
}
