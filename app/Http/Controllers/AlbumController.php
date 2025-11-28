<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'nullable|integer|digits:4',
            'times_sold' => 'nullable|integer'
        ]);

        Album::create($request->all());
        return redirect()->route('albums.index')->with('success', 'Album toegevoegd!');
    }

    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }

    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'nullable|integer|digits:4',
            'times_sold' => 'nullable|integer'
        ]);

        $album->update($request->all());
        return redirect()->route('albums.index')->with('success', 'Album bijgewerkt!');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index')->with('success', 'Album verwijderd!');
    }
}
