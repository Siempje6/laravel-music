@extends('layouts.app')

@section('content')

<style>
.welcome {
    display: grid;
    grid-template-columns: 1fr;
    gap: 0px;
    padding-top: 0px;
    margin-top: 0px;
}

.welcome-buttons {
    display: grid;
    grid-template-columns: 1fr;
    gap: 12px;
}

.welcome-buttons a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 14px;
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    color: #fff;
}

.btn-primary {
    background-color: #1a73e8;
    box-shadow: 0 8px 30px rgba(26,115,232,0.12);
}

.btn-info {
    background-color: #43aa8b;
}

.artists-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 12px;
}

.artist-item {
    background: #ffffff;
    padding: 16px;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(16,24,40,0.06);
    display: grid;
    grid-template-columns: 1fr;
    gap: 6px;
}

.artist-item h4 {
    font-size: 15px;
    margin: 0;
    font-weight: 600;
}

.artist-item p {
    font-size: 14px;
    color: #6b7280;
    margin: 0;
}
</style>

<div class="welcome container">
    <h1>Welkom bij Music Library</h1>
    <p>Ontdek en beheer albums en songs van je favoriete artiesten.</p>

    <div class="welcome-buttons">
        <a href="{{ route('albums.index') }}" class="btn-primary">Bekijk Albums</a>
        <a href="{{ route('songs.index') }}" class="btn-info">Bekijk Songs</a>
    </div>

    <div class="artists-grid">
        @foreach($bands as $band)
        <div class="artist-item">
            <h4>{{ $band->name }}</h4>
            <p>Genre: {{ $band->genre }}</p>
            <p>Opgericht: {{ $band->founded }}</p>
        </div>
        @endforeach
    </div>
</div>

@endsection
