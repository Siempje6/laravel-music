@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bewerk Song</h1>

    <form action="{{ route('songs.update', $song->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $song->title }}" required>
        </div>
        <div class="mb-3">
            <label>Singer</label>
            <input type="text" name="singer" class="form-control" value="{{ $song->singer }}" required>
        </div>
        <div class="mb-3">
            <label>Koppel aan Albums</label>
            <select name="albums[]" multiple class="form-control">
                @foreach($albums as $album)
                    <option value="{{ $album->id }}" {{ $song->albums->contains($album->id) ? 'selected' : '' }}>
                        {{ $album->name }}
                    </option>
                @endforeach
            </select>
            <small>Houd cmd/ctrl ingedrukt om meerdere albums te selecteren</small>
        </div>
        <button class="btn btn-success">Opslaan</button>
    </form>
</div>
@endsection
