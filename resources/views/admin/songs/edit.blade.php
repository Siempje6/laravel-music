@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bewerk Song</h1>
    <form action="{{ route('admin.songs.update', $song) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <label>Titel</label>
            <input type="text" name="title" value="{{ $song->title }}" required>
        </div>

        <div class="field">
            <label>Artiest</label>
            <input type="text" name="singer" value="{{ $song->singer }}" required>
        </div>

        <div class="field">
            <label>Kies Albums</label>
            <select name="albums[]" multiple>
                @foreach($albums as $album)
                    <option value="{{ $album->id }}" {{ $song->albums->contains($album->id) ? 'selected' : '' }}>{{ $album->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Opslaan</button>
            <a href="{{ route('admin.songs.index') }}" class="btn btn-ghost">Annuleren</a>
        </div>
    </form>
</div>
@endsection
