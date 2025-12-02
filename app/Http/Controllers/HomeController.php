<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Band; // Zorg dat je een Band model hebt

class HomeController extends Controller
{
    public function index()
    {
        $bands = Band::all(); // Haal alle bands op uit de database
        return view('welcome', compact('bands')); // Stuur $bands naar de view
    }
}
