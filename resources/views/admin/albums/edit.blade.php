@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bewerk Album</h1>
    <form action="{{ route('admin.albums.update', $album) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <label>Naam</label>
            <input type="text" name="name" value="{{ $album->name }}" required>
        </div>

        <div class="field">
            <label>Jaar</label>
            <input type="number" name="year" value="{{ $album->year }}">
        </div>

        <div class="field">
            <label>Times Sold</label>
            <input type="number" name="times_sold" value="{{ $album->times_sold }}">
        </div>

        <div class="field">
            <label>Kies Songs</label>
            <select name="songs[]" multiple>
                @foreach($songs as $song)
                    <option value="{{ $song->id }}" {{ $album->songs->contains($song->id) ? 'selected' : '' }}>{{ $song->title }}</option>
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
