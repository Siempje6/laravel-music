@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $album->name }}</h1>
    <p><strong>Jaar:</strong> {{ $album->year ?? 'Onbekend' }}</p>
    <p><strong>Times Sold:</strong> {{ $album->times_sold ?? 0 }}</p>

    <h2 class="mt-4">Nummers</h2>
    @if($album->songs->isNotEmpty())
        <ul>
            @foreach($album->songs as $song)
                <li>{{ $song->title }} - {{ $song->singer }}</li>
            @endforeach
        </ul>
    @else
        <p>Geen nummers in dit album</p>
    @endif

    <div class="mt-4">
        <a href="{{ route('admin.albums.index') }}" class="btn btn-ghost">Terug naar overzicht</a>
        <a href="{{ route('admin.albums.edit', $album->id) }}" class="btn btn-edit">Bewerk</a>
    </div>
</div>
@endsection
