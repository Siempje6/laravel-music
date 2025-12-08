@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $album->name }}</h1>
    <p><strong>Band:</strong> {{ $album->band->name ?? 'geen band'}}</p>
    <p><strong>Jaar:</strong> {{ $album->year }}</p>
    <p><strong>Times Sold:</strong> {{ $album->times_sold }}</p>

    <h2 class="mt-4">Songs</h2>
    @if($album->songs->count())
        <ul>
            @foreach($album->songs as $song)
                <li>{{ $song->title }} ({{ $song->singer }})</li>
            @endforeach
        </ul>
    @else
        <p>Geen songs gekoppeld aan dit album.</p>
    @endif

    <a href="{{ route('albums.index') }}" class="btn btn-secondary mt-3">Terug</a>
</div>
@endsection
