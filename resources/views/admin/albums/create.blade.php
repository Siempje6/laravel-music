@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuw Album Toevoegen</h1>
    <form action="{{ route('admin.albums.store') }}" method="POST">
        @csrf

        <div class="field">
            <label>Naam</label>
            <input type="text" name="name" required>
        </div>

        <div class="field">
            <label>Jaar</label>
            <input type="number" name="year">
        </div>

        <div class="field">
            <label>Times Sold</label>
            <input type="number" name="times_sold">
        </div>

        <div class="field">
            <label>Kies Songs</label>
            <select name="songs[]" multiple>
                @foreach($songs as $song)
                    <option value="{{ $song->id }}">{{ $song->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Opslaan</button>
            <a href="{{ route('admin.albums.index') }}" class="btn btn-ghost">Annuleren</a>
        </div>
    </form>
</div>
@endsection
