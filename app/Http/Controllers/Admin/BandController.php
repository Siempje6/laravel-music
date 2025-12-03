<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Band;

class BandController extends Controller
{
    public function index()
    {
        $bands = Band::latest()->get();
        return view('admin.bands.index', compact('bands'));
    }

    public function create()
    {
        return view('admin.bands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
        ]);

        Band::create($request->all());
        return redirect()->route('admin.bands.index')->with('success', 'Band toegevoegd!');
    }

    public function edit(Band $band)
    {
        return view('admin.bands.edit', compact('band'));
    }

    public function update(Request $request, Band $band)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
            'founded' => 'required|integer|min:1800|max:' . date('Y'),
            'active_till' => 'nullable|string|max:255',
        ]);

        $band->update($request->all());
        return redirect()->route('admin.bands.index')->with('success', 'Band bijgewerkt!');
    }

    public function show(Band $band)
    {
        return view('admin.bands.show', compact('band'));
    }

    public function destroy(Band $band)
    {
        $band->delete();
        return redirect()->route('admin.bands.index')->with('success', 'Band verwijderd!');
    }
}
