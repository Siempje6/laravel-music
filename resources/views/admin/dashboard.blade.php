@extends('layouts.app')

@section('content')
<div class="admin-container">

    <h1>Admin Dashboard</h1>

    <div class="admin-tiles">

        <a href="{{ route('admin.users.index') }}" class="admin-tile">
            <h2>Users beheren</h2>
            <p>Bekijk, wijzig of verwijder gebruikers</p>
        </a>

        <a href="{{ route('admin.bands.index') }}" class="admin-tile">
            <h2>Bands beheren</h2>
            <p>Voeg nieuwe bands toe of bewerk ze</p>
        </a>

        <a href="{{ route('admin.albums.index') }}" class="admin-tile">
            <h2>Albums beheren</h2>
            <p>Volledig album management</p>
        </a>

        <a href="{{ route('admin.songs.index') }}" class="admin-tile">
            <h2>Songs beheren</h2>
            <p>Snel alle songs aanpassen</p>
        </a>

    </div>


    {{-- USERS --}}
    <div class="admin-section">
        <div class="admin-section-top">
            <h2>Users</h2>
            <a href="{{ route('admin.users.index') }}" class="admin-btn">Beheer Users</a>
        </div>

        <div class="card-row">
            @foreach($latestUsers as $user)
            <div class="admin-card">
                <h3>{{ $user->name }}</h3>
                <p>{{ $user->email }}</p>
                <p class="date">Joined: {{ $user->created_at->format('d-m-Y') }}</p>
            </div>
            @endforeach
        </div>
    </div>

    {{-- BANDS --}}
    <div class="admin-section">
        <div class="admin-section-top">
            <h2>Bands</h2>
            <a href="{{ route('admin.bands.index') }}" class="admin-btn">Beheer Bands</a>
        </div>

        <div class="card-row">
            @foreach($latestBands as $band)
            <div class="admin-card">
                <h3>{{ $band->name }}</h3>
                <p>{{ $band->genre }}</p>
                <p class="date">Toegevoegd: {{ $band->created_at->format('d-m-Y') }}</p>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ALBUMS --}}
    <div class="admin-section">
        <div class="admin-section-top">
            <h2>Albums</h2>
            <a href="{{ route('admin.albums.index') }}" class="admin-btn">Beheer Albums</a>
        </div>

        <div class="card-row">
            @foreach($latestAlbums as $album)
            <div class="admin-card">
                <h3>{{ $album->name }}</h3>
                <p>{{ $album->genre }}</p>
                <p class="date">Toegevoegd: {{ $album->created_at->format('d-m-Y') }}</p>
            </div>
            @endforeach
        </div>
    </div>

    {{-- SONGS --}}
    <div class="admin-section">
        <div class="admin-section-top">
            <h2>Songs</h2>
            <a href="{{ route('admin.songs.index') }}" class="admin-btn">Beheer Songs</a>
        </div>

        <div class="card-row">
            @foreach($latestSongs as $song)
            <div class="admin-card">
                <h3>{{ $song->title }}</h3>
                <p>{{ $song->singer }}</p>
                <p class="date">Toegevoegd: {{ $song->created_at->format('d-m-Y') }}</p>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection