@extends('layouts.app')

@section('content')
<h1>Nieuwe Band</h1>
<form action="{{ route('bands.store') }}" method="POST">
    @csrf
    <label>Naam:</label><br>
    <input type="text" name="name" required><br>
    <label>Genre:</label><br>
    <input type="text" name="genre" required><br>
    <label>Opgericht:</label><br>
    <input type="number" name="founded" required><br>
    <label>Actief tot:</label><br>
    <input type="text" name="active_till" value="Heden"><br><br>
    <button type="submit">Opslaan</button>
</form>
@endsection
