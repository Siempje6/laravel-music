@extends('layouts.app')

@section('content')

<h1>Zoekresultaten voor: "{{ $q }}"</h1>

@if ($albums->isEmpty() && $songs->isEmpty() && $bands->isEmpty())
    <div class="empty mt-6">
        <h3>Geen resultaten gevonden</h3>
        <p>Probeer een andere zoekterm.</p>
    </div>
@endif


@if ($albums->isNotEmpty())
    <h2 class="mt-6">Albums</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Jaar</th>
                <th>Band</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
            <tr>
                <td>{{ $album->name }}</td>
                <td>{{ $album->year }}</td>
                <td>{{ $album->band->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif


@if ($songs->isNotEmpty())
    <h2 class="mt-6">Songs</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Titel</th>
                <th>Zanger</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($songs as $song)
            <tr>
                <td>{{ $song->title }}</td>
                <td>{{ $song->singer }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif


@if ($bands->isNotEmpty())
    <h2 class="mt-6">Artists</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bands as $band)
            <tr>
                <td>{{ $band->name }}</td>
                <td>{{ $band->genre }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
