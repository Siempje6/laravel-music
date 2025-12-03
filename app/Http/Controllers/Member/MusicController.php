<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;

class MusicController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('member'); 
    }

    public function index() {
        $albums = Album::all();
        return view('member.music.index', compact('albums'));
    }

    public function albums() {
        $albums = Album::all();
        return view('member.music.albums', compact('albums'));
    }
}
