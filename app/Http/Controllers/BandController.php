<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index()
    {
        $bands = Band::all();
        return view('bands.index', compact('bands'));
    }

    public function create()
    {
        return view('bands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'founded' => 'required|integer|digits:4',
            'active_till' => 'nullable|string|max:255'
        ]);

        Band::create($request->all());

        return redirect()->route('bands.index')->with('success', 'Band toegevoegd!');
    }

    public function show(Band $band)
    {
        $band->load('albums'); // alle albums laden
        return view('bands.show', compact('band'));
    }

    public function edit(Band $band)
    {
        return view('bands.edit', compact('band'));
    }

    public function update(Request $request, Band $band)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'founded' => 'required|integer|digits:4',
            'active_till' => 'nullable|string|max:255'
        ]);

        $band->update($request->all());
        return redirect()->route('bands.index')->with('success', 'Band bijgewerkt!');
    }

    public function destroy(Band $band)
    {
        $band->delete();
        return redirect()->route('bands.index')->with('success', 'Band verwijderd!');
    }
}
