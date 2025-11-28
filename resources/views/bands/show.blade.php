@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $band->name }}</h1>
    <p><strong>Genre:</strong> {{ $band->genre }}</p>
    <p><strong>Opgericht:</strong> {{ $band->founded }}</p>
    <p><strong>Actief tot:</strong> {{ $band->active_till }}</p>

    <h2 class="mt-4">Albums</h2>
    @if($band->albums->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Jaar</th>
                <th>Times Sold</th>
                <th>Songs</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($band->albums as $album)
            <tr>
                <td>{{ $album->name }}</td>
                <td>{{ $album->year }}</td>
                <td>{{ $album->times_sold }}</td>
                <td>
                    @foreach($album->songs as $song)
                        {{ $song->title }}@if(!$loop->last), @endif
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('albums.show', $album->id) }}" class="btn btn-info btn-sm">Bekijk</a>
                    <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-warning btn-sm">Bewerk</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>Geen albums gevonden voor deze band.</p>
    @endif

    <a href="{{ route('bands.index') }}" class="btn btn-secondary mt-3">Terug</a>
</div>
@endsection
