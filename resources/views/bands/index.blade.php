@extends('layouts.app')

@section('content')
<h1>Bands</h1>
<a href="{{ route('bands.create') }}" class="button">Nieuwe Band</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Genre</th>
            <th>Opgericht</th>
            <th>Actief tot</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bands as $band)
        <tr>
            <td>{{ $band->id }}</td>
            <td>{{ $band->name }}</td>
            <td>{{ $band->genre }}</td>
            <td>{{ $band->founded }}</td>
            <td>{{ $band->active_till }}</td>
            <td>
                <a href="{{ route('bands.show', $band->id) }}" class="button">Bekijk</a>
                <a href="{{ route('bands.edit', $band->id) }}" class="button">Bewerk</a>
                <form action="{{ route('bands.destroy', $band->id) }}" method="POST" class="inline">
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