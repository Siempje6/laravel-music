@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Alle Albums</h1>
    <a href="{{ route('albums.create') }}" class="btn btn-primary mb-3">Nieuw Album</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Band</th>
                <th>Jaar</th>
                <th>Times Sold</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $album)
            <tr>
                <td>{{ $album->name }}</td>
                <td>{{ $album->band->name }}</td>
                <td>{{ $album->year }}</td>
                <td>{{ $album->times_sold }}</td>
                <td>
                    <a href="{{ route('albums.show', $album->id) }}" class="btn btn-info btn-sm">Bekijk</a>
                    <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-warning btn-sm">Bewerk</a>
                    <form action="{{ route('albums.destroy', $album->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Verwijder</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
