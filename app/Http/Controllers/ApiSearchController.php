<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MusicApiService;

class ApiSearchController extends Controller
{
    public function search(Request $request, MusicApiService $api)
    {
        $query = $request->input('q');

        if (!$query) {
            return response()->json([]);
        }

        $results = $api->searchTracks($query);

        return response()->json($results);
    }
}
