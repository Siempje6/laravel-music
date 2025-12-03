@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-6">Bewerk Band</h1>

    <form action="{{ route('admin.bands.update', $band->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <label for="name">Naam van de band</label>
            <input type="text" name="name" id="name" value="{{ old('name', $band->name) }}" required>
            @error('name')<span class="muted">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="{{ old('genre', $band->genre) }}">
            @error('genre')<span class="muted">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label for="founded">Founded</label>
            <input type="number" name="founded" id="founded" value="{{ old('founded', $band->founded) }}" required>
            @error('founded')<span class="muted">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label for="active_till">Active Till</label>
            <input type="text" name="active_till" id="active_till" value="{{ old('active_till', $band->active_till) }}">
            @error('active_till')<span class="muted">{{ $message }}</span>@enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Opslaan</button>
            <a href="{{ route('admin.bands.index') }}" class="btn btn-ghost">Annuleren</a>
        </div>
    </form>
</div>
@endsection
