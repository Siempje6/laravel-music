@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="albums-header">
        <h1>Albums beheren</h1>
        <a href="{{ route('admin.albums.create') }}" class="btn btn-primary">Nieuw Album Toevoegen</a>
    </div>

    @if($albums->count())
    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Jaar</th>
                <th>Times Sold</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
            <tr>
                <td>{{ $album->name }}</td>
                <td>{{ $album->year ?? '-' }}</td>
                <td>{{ $album->times_sold ?? '-' }}</td>
                <td class="actions">
                    <a href="{{ route('admin.albums.show', $album) }}" class="btn btn-info btn-small">Bekijk</a>
                    <a href="{{ route('admin.albums.edit', $album) }}" class="btn btn-edit btn-small">Bewerk</a>
                    <form action="{{ route('admin.albums.destroy', $album) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-small" onclick="return confirm('Weet je het zeker?')">Verwijder</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Geen albums gevonden.</p>
    @endif
</div>
@endsection
