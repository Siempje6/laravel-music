@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $song->title }}</h1>
    <p><strong>Singer:</strong> {{ $song->singer }}</p>
    <p><strong>Albums:</strong>
        @foreach($song->albums as $album)
            {{ $album->name }}@if(!$loop->last), @endif
        @endforeach
    </p>
    <a href="{{ route('songs.index') }}" class="btn btn-secondary">Terug</a>
</div>
@endsection
