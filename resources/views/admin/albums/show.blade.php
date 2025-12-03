@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Album: {{ $album->name }}</h1>
    <p>Jaar: {{ $album->year ?? '-' }}</p>
    <p>Times Sold: {{ $album->times_sold ?? '-' }}</p>
    <h3>Songs:</h3>
    <ul>
        @forelse($album->songs as $song)
            <li>{{ $song->title }}</li>
        @empty
            <li>Geen songs gekoppeld</li>
        @endforelse
    </ul>
    <a href="{{ route('admin.albums.index') }}" class="btn btn-ghost">Terug</a>
</div>
@endsection
