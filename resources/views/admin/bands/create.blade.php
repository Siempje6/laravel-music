@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-6">Nieuwe Band Toevoegen</h1>

    <form action="{{ route('admin.bands.store') }}" method="POST">
        @csrf

        <div class="field">
            <label for="name">Naam van de band</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')<span class="muted">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="{{ old('genre') }}">
            @error('genre')<span class="muted">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label for="founded">Founded</label>
            <input type="number" name="founded" id="founded" value="{{ old('founded') }}" required>
            @error('founded')<span class="muted">{{ $message }}</span>@enderror
        </div>

        <div class="field">
            <label for="active_till">Active Till</label>
            <input type="text" name="active_till" id="active_till" value="{{ old('active_till', 'Heden') }}">
            @error('active_till')<span class="muted">{{ $message }}</span>@enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Opslaan</button>
            <a href="{{ route('admin.bands.index') }}" class="btn btn-ghost">Annuleren</a>
        </div>
    </form>
</div>
@endsection
