@extends('layouts.app')

@section('content')
<h1>{{ $album->name }}</h1>
<p>Jaar: {{ $album->year ?? 'Onbekend' }}</p>
<p>Verkocht: {{ $album->times_sold ?? 'Onbekend' }}</p>
<a href="{{ route('albums.index') }}" class="button">Terug</a>
@endsection
