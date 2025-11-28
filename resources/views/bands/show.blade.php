@extends('layouts.app')

@section('content')
<h1>{{ $band->name }}</h1>
<p>Genre: {{ $band->genre }}</p>
<p>Opgericht: {{ $band->founded }}</p>
<p>Actief tot: {{ $band->active_till }}</p>
<a href="{{ route('bands.index') }}" class="button">Terug</a>
@endsection
