@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Welkom bij Music Library</h1>
    <p class="mb-6 text-gray-600">Ontdek en beheer albums en songs van je favoriete artiesten.</p>

    <div class="admin-tiles" style="margin-top: 20px;">
        <a href="{{ route('bands.index') }}" class="admin-tile">
            <h2>Bands Bekijken</h2>
            <p>Snel alle bands bekijken</p>
        </a>

        <a href="{{ route('albums.index') }}" class="admin-tile">
            <h2>Albums Bekijken</h2>
            <p>Snel alle albums bekijken</p>
        </a>

        <a href="{{ route('songs.index') }}" class="admin-tile">
            <h2>Songs Bekijken</h2>
            <p>Snel alle songs bekijken</p>
        </a>

    </div>
</div>
@endsection
