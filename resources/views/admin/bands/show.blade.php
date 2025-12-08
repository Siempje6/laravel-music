@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-6">Band Details</h1>

    {{-- BAND CARD --}}
    <div class="card">
        <h2>{{ $band->name }}</h2>
        <p><strong>Genre:</strong> {{ $band->genre }}</p>
        <p><strong>Founded:</strong> {{ $band->founded }}</p>
        <p><strong>Active Till:</strong> {{ $band->active_till }}</p>
    </div>

    {{-- ALBUM TABEL EXACT ALS INDEX --}}
    <h2 class="mt-8 mb-4">Albums</h2>

    <table class="table album-table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Jaar</th>
                <th>Times Sold</th>
                <th>Eerste Nummer</th>
                <th>Bekijken</th>
            </tr>
        </thead>

        <tbody>
            @forelse($band->albums as $album)
            <tr class="album-row" data-target="songs-{{ $album->id }}">
                <td>{{ $album->name }}</td>
                <td>{{ $album->year ?? '-' }}</td>
                <td>{{ $album->times_sold ?? '-' }}</td>

                {{-- SONG PREVIEW SAME AS ALBUM INDEX --}}
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
                </td>
            </tr>

            {{-- ACCORDEON ROW EXACT NAMAAKT --}}
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

            @empty
            <tr>
                <td colspan="6">Deze band heeft geen albums.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- TERUG / BEWERK --}}
    <div class="mt-4">
        <a href="{{ route('admin.bands.index') }}" class="btn btn-ghost">Terug naar overzicht</a>
        <a href="{{ route('admin.bands.edit', $band->id) }}" class="btn btn-edit">Bewerk</a>
    </div>
</div>

{{-- ACCORDEON SCRIPT EXACT VAN INDEX --}}
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
