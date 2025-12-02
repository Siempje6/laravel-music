<?php
namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Album;
use Illuminate\Http\Request;

class MemberMusicController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $songs = $user->songs()->latest()->get();
        $albums = $user->albums()->latest()->get();
        return view('member.music.index', compact('songs','albums'));
    }

    public function createSong()
    {
        return view('member.music.create-song');
    }

    public function storeSong(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'singer' => 'nullable|string|max:255',
        ]);

        Song::create([
            'title' => $request->title,
            'singer' => $request->singer ?? auth()->user()->name,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('member.music.index')->with('success','Song toegevoegd.');
    }

    public function createAlbum()
    {
        return view('member.music.create-album');
    }

    public function storeAlbum(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'nullable|digits:4|integer',
        ]);

        Album::create([
            'name' => $request->name,
            'year' => $request->year,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('member.music.index')->with('success','Album toegevoegd.');
    }
}
