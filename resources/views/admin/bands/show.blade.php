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

    <h2 class="mt-8 mb-4">Albums</h2>

    @forelse($band->albums as $album)
        <div class="card mb-2">
            <div class="flex justify-between items-center cursor-pointer album-toggle" data-target="album-{{ $album->id }}">
                <h3 class="m-0">{{ $album->name }} ({{ $album->year ?? 'Onbekend' }})</h3>
                <span class="text-xl">▶️</span>
            </div>
            <div id="album-{{ $album->id }}" class="hidden mt-2">
                <ul class="ml-4 list-disc">
                    @forelse($album->songs as $song)
                        <li>{{ $song->title }} - {{ $song->singer }}</li>
                    @empty
                        <li>Geen nummers in dit album</li>
                    @endforelse
                </ul>
            </div>
        </div>
    @empty
        <p>Geen albums gevonden voor deze band.</p>
    @endforelse

    <div class="mt-4">
        <a href="{{ route('admin.bands.index') }}" class="btn btn-ghost">Terug naar overzicht</a>
        <a href="{{ route('admin.bands.edit', $band->id) }}" class="btn btn-edit">Bewerk</a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggles = document.querySelectorAll('.album-toggle');
        toggles.forEach(toggle => {
            toggle.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const content = document.getElementById(targetId);
                content.classList.toggle('hidden');
                const icon = this.querySelector('span');
                icon.textContent = content.classList.contains('hidden') ? '▶️' : '🔽';
            });
        });
    });
</script>
@endsection
