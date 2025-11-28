@extends('layouts.app')

@section('content')
<h1>Bewerk Album</h1>
<form action="{{ route('albums.update', $album->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Naam:</label><br>
    <input type="text" name="name" value="{{ $album->name }}" required><br>
    <label>Jaar:</label><br>
    <input type="number" name="year" value="{{ $album->year }}"><br>
    <label>Verkocht:</label><br>
    <input type="number" name="times_sold" value="{{ $album->times_sold }}"><br><br>
    <button type="submit">Opslaan</button>
</form>
@endsection
