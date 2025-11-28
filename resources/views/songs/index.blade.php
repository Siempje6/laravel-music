@extends('layouts.app')

@section('content')
<h1>Songs</h1>

<a href="{{ route('songs.create') }}" class="button add">Nieuw Song</a>

<table>
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
            <td>
                <a href="{{ route('songs.show', $song->id) }}" class="button info">Bekijk</a>
                <a href="{{ route('songs.edit', $song->id) }}" class="button edit">Bewerk</a>
                <form action="{{ route('songs.destroy', $song->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete">Verwijder</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
