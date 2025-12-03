@extends('layouts.app')

@section('content')
<div class="container">
    <div class="albums-header">
        <h1>Songs beheren</h1>
        <a href="{{ route('admin.songs.create') }}" class="btn btn-primary">Nieuwe Song Toevoegen</a>
    </div>

    @if($songs->count())
    <table class="table">
        <thead>
            <tr>
                <th>Titel</th>
                <th>Artiest</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($songs as $song)
            <tr>
                <td>{{ $song->title }}</td>
                <td>{{ $song->singer }}</td>
                <td class="actions">
                    <a href="{{ route('admin.songs.show', $song) }}" class="btn btn-info btn-small">Bekijk</a>
                    <a href="{{ route('admin.songs.edit', $song) }}" class="btn btn-edit btn-small">Bewerk</a>
                    <form action="{{ route('admin.songs.destroy', $song) }}" method="POST" style="display:inline;">
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
    <p>Geen songs gevonden.</p>
    @endif
</div>
@endsection
