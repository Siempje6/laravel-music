<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::latest()->get();
        return view('admin.albums.index', compact('albums'));
    }

    public function create()
    {
        $songs = Song::all();
        return view('admin.albums.create', compact('songs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'times_sold' => 'nullable|integer|min:0',
            'songs' => 'nullable|array',
        ]);

        $album = Album::create($request->only('name', 'year', 'times_sold'));

        if ($request->has('songs')) {
            $album->songs()->sync($request->songs);
        }

        return redirect()->route('admin.albums.index')->with('success', 'Album toegevoegd!');
    }

    public function edit(Album $album)
    {
        $songs = Song::all();
        return view('admin.albums.edit', compact('album', 'songs'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'times_sold' => 'nullable|integer|min:0',
            'songs' => 'nullable|array',
        ]);

        $album->update($request->only('name', 'year', 'times_sold'));

        if ($request->has('songs')) {
            $album->songs()->sync($request->songs);
        }

        return redirect()->route('admin.albums.index')->with('success', 'Album bijgewerkt!');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('admin.albums.index')->with('success', 'Album verwijderd!');
    }

    public function show(Album $album)
    {
        $album->load('songs');
        return view('admin.albums.show', compact('album'));
    }
}
