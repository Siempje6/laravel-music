@extends('layouts.app')

@section('content')
<h1>Bands</h1>

<a href="{{ route('bands.create') }}" class="btn btn-primary btn-small mb-4">+ Voeg band toe</a>

<table class="table">
    <thead>
        <tr>
            <th>Naam</th>
            <th>Genre</th>
            <th>Opgericht</th>
            <th>Actief tot</th>
            <th>Albums</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bands as $band)
        <tr>
            <td>{{ $band->name }}</td>
            <td>{{ $band->genre }}</td>
            <td>{{ $band->founded }}</td>
            <td>{{ $band->active_till }}</td>
            <td>
                <a href="{{ route('bands.show', $band->id) }}" class="btn btn-info btn-small">Bekijk albums</a>
            </td>
            <td class="actions">
                <a href="{{ route('bands.edit', $band->id) }}" class="btn btn-edit btn-small">Bewerk</a>
                <form action="{{ route('bands.destroy', $band->id) }}" method="POST" style="display:inline;">
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
