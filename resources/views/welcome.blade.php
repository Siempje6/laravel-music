@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Welkom bij Music Library</h1>
    <p class="mb-6 text-gray-600">Ontdek en beheer albums en songs van je favoriete artiesten.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($bands as $band)
            <div class="bg-white rounded-lg shadow p-4 hover:shadow-lg transition duration-300">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $band->name }}</h2>
                <p class="text-gray-500">Genre: {{ $band->genre }}</p>
                <p class="text-gray-500">Opgericht: {{ $band->founded }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
