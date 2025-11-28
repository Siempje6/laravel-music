@extends('layouts.app')

@section('content')
<div class="welcome">
    <h1>Welkom bij Music Library</h1>
    <p>Ontdek en beheer albums en songs van je favoriete artiesten.</p>

    <div class="welcome-links">
        <a href="{{ route('albums.index') }}" class="cta-button button add">Bekijk Albums</a>
        <a href="{{ route('songs.index') }}" class="cta-button button info">Bekijk Songs</a>
    </div>

    <div class="artists">
        <h2>Beschikbare Artiesten</h2>
        <ul>
            @foreach($bands as $band)
                <li>{{ $band->name }} ({{ $band->genre }}, opgericht: {{ $band->founded }})</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
