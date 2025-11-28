@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bewerk Album</h1>

    <form action="{{ route('albums.update', $album->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Naam</label>
            <input type="text" name="name" class="form-control" value="{{ $album->name }}" required>
        </div>
        <div class="mb-3">
            <label>Band</label>
            <select name="band_id" class="form-control" required>
                @foreach($bands as $band)
                    <option value="{{ $band->id }}" {{ $album->band_id == $band->id ? 'selected' : '' }}>{{ $band->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jaar</label>
            <input type="number" name="year" class="form-control" value="{{ $album->year }}" required>
        </div>
        <div class="mb-3">
            <label>Times Sold</label>
            <input type="number" name="times_sold" class="form-control" value="{{ $album->times_sold }}" required>
        </div>
        <div class="mb-3">
            <label>Koppel Songs</label>
            <select name="songs[]" multiple class="form-control">
                @foreach($songs as $song)
                    <option value="{{ $song->id }}" {{ $album->songs->contains($song->id) ? 'selected' : '' }}>
                        {{ $song->title }}
                    </option>
                @endforeach
            </select>
            <small>Houd cmd/ctrl ingedrukt om meerdere songs te selecteren</small>
        </div>
        <button class="btn btn-success">Opslaan</button>
    </form>
</div>
@endsection
