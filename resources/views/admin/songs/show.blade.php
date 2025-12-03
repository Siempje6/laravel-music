@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Song: {{ $song->title }}</h1>
    <p>Artiest: {{ $song->singer }}</p>

    <h3>Albums:</h3>
    <ul>
        @forelse($song->albums as $album)
            <li>{{ $album->name }}</li>
        @empty
            <li>Niet gekoppeld aan een album</li>
        @endforelse
    </ul>

    <a href="{{ route('admin.songs.index') }}" class="btn btn-ghost">Terug</a>
</div>
@endsection
