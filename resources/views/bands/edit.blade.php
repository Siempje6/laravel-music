@extends('layouts.app')

@section('content')
<h1>Bewerk Band</h1>
<form action="{{ route('bands.update', $band->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Naam:</label><br>
    <input type="text" name="name" value="{{ $band->name }}" required><br>
    <label>Genre:</label><br>
    <input type="text" name="genre" value="{{ $band->genre }}" required><br>
    <label>Opgericht:</label><br>
    <input type="number" name="founded" value="{{ $band->founded }}" required><br>
    <label>Actief tot:</label><br>
    <input type="text" name="active_till" value="{{ $band->active_till }}"><br><br>
    <button type="submit">Opslaan</button>
</form>
@endsection
