@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-6">Band Details</h1>

    <div class="card">
        <h2>{{ $band->name }}</h2>
        <p><strong>Genre:</strong> {{ $band->genre }}</p>
        <p><strong>Founded:</strong> {{ $band->founded }}</p>
        <p><strong>Active Till:</strong> {{ $band->active_till }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.bands.index') }}" class="btn btn-ghost">Terug naar overzicht</a>
        <a href="{{ route('admin.bands.edit', $band->id) }}" class="btn btn-edit">Bewerk</a>
    </div>
</div>
@endsection
