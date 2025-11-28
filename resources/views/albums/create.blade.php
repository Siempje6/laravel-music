@extends('layouts.app')

@section('content')
<h1>Nieuw Album</h1>
<form action="{{ route('albums.store') }}" method="POST">
    @csrf
    <label>Naam:</label><br>
    <input type="text" name="name" required><br>
    <label>Jaar:</label><br>
    <input type="number" name="year"><br>
    <label>Verkocht:</label><br>
    <input type="number" name="times_sold"><br><br>
    <button type="submit">Opslaan</button>
</form>
@endsection
