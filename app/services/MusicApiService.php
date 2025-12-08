<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MusicApiService
{
    private $apiKey;
    private $secret;

    public function __construct()
    {
        $this->apiKey = env('LASTFM_API_KEY');
        $this->secret = env('LASTFM_SECRET');
    }

    public function searchTracks($query)
    {
        $url = "http://ws.audioscrobbler.com/2.0/";

        // SSL verificatie uitgeschakeld voor Windows
        $response = Http::withoutVerifying()->get($url, [
            'method' => 'track.search',
            'track' => $query,
            'api_key' => $this->apiKey,
            'format' => 'json',
        ]);

        if (!$response->successful()) {
            return collect(); // fallback bij API issues
        }

        $tracks = $response->json()['results']['trackmatches']['track'] ?? [];

        return collect($tracks)->map(function ($t) {
            return [
                'title' => $t['name'] ?? '',
                'artist' => $t['artist'] ?? '',
                'url' => $t['url'] ?? '',
            ];
        });
    }
}
