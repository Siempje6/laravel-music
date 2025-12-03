
@extends('layouts.app')

@section('content')
<div class="container">

    <div class="albums-header">
        <h1 class="mb-6">Bands beheren</h1>
        <a href="{{ route('admin.bands.create') }}" class="btn btn-primary">Nieuwe Band Toevoegen</a>
    </div>

    @if($bands->count())
    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Genre</th>
                <th>Founded</th>
                <th>Active Till</th>
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
                <td class="actions">
                    <a href="{{ route('admin.bands.show', $band->id) }}" class="btn btn-info btn-small">Bekijk</a>
                    <a href="{{ route('admin.bands.edit', $band->id) }}" class="btn btn-edit btn-small">Bewerk</a>
                    <form action="{{ route('admin.bands.destroy', $band->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-small" type="submit" onclick="return confirm('Weet je het zeker?');">Verwijder</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Geen bands gevonden.</p>
    @endif

</div>
@endsection
