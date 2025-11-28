@extends('layouts.app')

@section('content')
<h1>Songs</h1>

<a href="{{ route('songs.create') }}" class="btn btn-primary btn-small mb-4">Nieuw Song</a>

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Singer</th>
            <th>Albums</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($songs as $song)
        <tr>
            <td>{{ $song->title }}</td>
            <td>{{ $song->singer }}</td>
            <td>
                @foreach($song->albums as $album)
                    {{ $album->name }}@if(!$loop->last), @endif
                @endforeach
            </td>
            <td class="actions">
                <a href="{{ route('songs.show', $song->id) }}" class="btn btn-info btn-small">Bekijk</a>
                <a href="{{ route('songs.edit', $song->id) }}" class="btn btn-edit btn-small">Bewerk</a>
                <form action="{{ route('songs.destroy', $song->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-small">Verwijder</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
