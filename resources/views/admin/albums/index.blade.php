@extends('layouts.app')

@section('content')
<div class="container">

    <div class="albums-header">
        <h1 class="mb-6">Albums Overzicht</h1>

        <a href="{{ route('admin.albums.create') }}" class="btn btn-primary mb-4">Nieuw Album</a>
    </div>

    <table class="table album-table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Jaar</th>
                <th>Times Sold</th>
                <th>Nummers</th>
                <th>Acties</th>
            </tr>
        </thead>

        <tbody>
            @foreach($albums as $album)
            <tr class="album-row" data-target="songs-{{ $album->id }}">
                <td>{{ $album->name }}</td>
                <td>{{ $album->year ?? '-' }}</td>
                <td>{{ $album->times_sold ?? '-' }}</td>

                <td class="song-preview">
                    @if($album->songs->count() > 0)
                    {{ $album->songs->first()->title }} – {{ $album->songs->first()->singer }}
                    @if($album->songs->count() > 1)
                    <span class="more-indicator">(+{{ $album->songs->count() - 1 }} meer)</span>
                    @endif
                    @else
                    Geen nummers
                    @endif
                </td>

                <td class="actions">
                    <a href="{{ route('admin.albums.show', $album->id) }}" class="btn btn-info btn-small">Bekijken</a>
                    <a href="{{ route('admin.albums.edit', $album->id) }}" class="btn btn-edit btn-small">Bewerk</a>
                    <form action="{{ route('admin.albums.destroy', $album->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-small" onclick="return confirm('Weet je het zeker?')">
                            Verwijder
                        </button>
                    </form>
                </td>
            </tr>

            {{-- ACCORDEON ROW --}}
            <tr id="songs-{{ $album->id }}" class="song-accordion">
                <td colspan="6">
                    <div class="song-list">

                        @if($album->songs->count() > 0)
                        <ul>
                            @foreach($album->songs as $song)
                            <li>{{ $song->title }} – {{ $song->singer }}</li>
                            @endforeach
                        </ul>
                        @else
                        <p>Dit album bevat geen nummers.</p>
                        @endif

                    </div>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>


{{-- ACCORDEON SCRIPT --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {

        document.querySelectorAll(".album-row").forEach(row => {

            row.addEventListener("click", () => {
                const id = row.getAttribute("data-target");
                const target = document.getElementById(id);

                target.classList.toggle("open");
            });

        });

    });
</script>

@endsection