<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MusicApiService
{
    private $apiKey;
    private $secret;

    public function __construct()
    {
        $this->apiKey = "39ad6431d1b7bd56902f836ac411e0d9";
        $this->secret = "02551e76d8ae19f981fac990f373767f";
    }

    public function searchTracks($query)
    {
        $response = Http::get("http://ws.audioscrobbler.com/2.0/", [
            'method' => 'track.search',
            'track' => $query,
            'api_key' => $this->apiKey,
            'format' => 'json',
        ]);

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
