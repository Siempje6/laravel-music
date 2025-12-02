@extends('layouts.app')

@section('content')
<h1>Mijn muziek</h1>
@if(session('success')) <div>{{ session('success') }}</div> @endif

<a href="{{ route('member.music.createSong') }}">Nieuw nummer</a>
<a href="{{ route('member.music.createAlbum') }}">Nieuw album</a>

<h2>Albums</h2>
<ul>
    @foreach($albums as $album)
        <li>{{ $album->name }} ({{ $album->year }})</li>
    @endforeach
</ul>

<h2>Songs</h2>
<ul>
    @foreach($songs as $song)
        <li>{{ $song->title }} — {{ $song->singer }}</li>
    @endforeach
</ul>
@endsection
