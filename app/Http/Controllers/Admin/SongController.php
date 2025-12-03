<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Song;
use App\Models\Album;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::latest()->get();
        return view('admin.songs.index', compact('songs'));
    }

    public function create()
    {
        $albums = Album::all();
        return view('admin.songs.create', compact('albums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'singer' => 'required|string|max:255',
            'albums' => 'nullable|array',
        ]);

        $song = Song::create($request->only('title', 'singer'));

        if ($request->has('albums')) {
            $song->albums()->sync($request->albums);
        }

        return redirect()->route('admin.songs.index')->with('success', 'Song toegevoegd!');
    }

    public function edit(Song $song)
    {
        $albums = Album::all();
        return view('admin.songs.edit', compact('song', 'albums'));
    }

    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'singer' => 'required|string|max:255',
            'albums' => 'nullable|array',
        ]);

        $song->update($request->only('title', 'singer'));

        if ($request->has('albums')) {
            $song->albums()->sync($request->albums);
        }

        return redirect()->route('admin.songs.index')->with('success', 'Song bijgewerkt!');
    }

    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('admin.songs.index')->with('success', 'Song verwijderd!');
    }

    public function show(Song $song)
    {
        $song->load('albums');
        return view('admin.songs.show', compact('song'));
    }
}
