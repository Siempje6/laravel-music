@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuwe Song</h1>

    <form action="{{ route('songs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Singer</label>
            <input type="text" name="singer" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Koppel aan Albums</label>
            <select name="albums[]" multiple class="form-control">
                @foreach($albums as $album)
                    <option value="{{ $album->id }}">{{ $album->name }}</option>
                @endforeach
            </select>
            <small>Houd cmd/ctrl ingedrukt om meerdere albums te selecteren</small>
        </div>
        <button class="btn btn-success">Opslaan</button>
    </form>
</div>
@endsection
