@extends('layouts.app')

@section('content')
<h1>Albums</h1>
<a href="{{ route('albums.create') }}" class="button">Nieuw Album</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Jaar</th>
            <th>Verkocht</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($albums as $album)
        <tr>
            <td>{{ $album->id }}</td>
            <td>{{ $album->name }}</td>
            <td>{{ $album->year ?? 'Onbekend' }}</td>
            <td>{{ $album->times_sold ?? 'Onbekend' }}</td>
            <td>
                <a href="{{ route('albums.show', $album->id) }}" class="button">Bekijk</a>
                <a href="{{ route('albums.edit', $album->id) }}" class="button">Bewerk</a>
                <form action="{{ route('albums.destroy', $album->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Verwijder</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection