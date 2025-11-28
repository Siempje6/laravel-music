@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuw Album</h1>

    <form action="{{ route('albums.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Naam</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Band</label>
            <select name="band_id" class="form-control" required>
                @foreach($bands as $band)
                    <option value="{{ $band->id }}">{{ $band->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jaar</label>
            <input type="number" name="year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Times Sold</label>
            <input type="number" name="times_sold" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Koppel Songs</label>
            <select name="songs[]" multiple class="form-control">
                @foreach($songs as $song)
                    <option value="{{ $song->id }}">{{ $song->title }}</option>
                @endforeach
            </select>
            <small>Houd cmd/ctrl ingedrukt om meerdere songs te selecteren</small>
        </div>
        <button class="btn btn-success">Opslaan</button>
    </form>
</div>
@endsection
