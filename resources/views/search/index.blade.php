@extends('layouts.app')

@section('content')
<div class="container">

    <h2>🔎 Zoeken</h2>

    {{-- Filter knoppen --}}
    <div class="flex gap-3 mb-4">
        <a href="{{ route('search.index', ['type'=>'songs']) }}" class="btn {{ $type === 'songs' ? 'btn-primary' : 'btn-secondary' }}">Songs</a>
        <a href="{{ route('search.index', ['type'=>'albums']) }}" class="btn {{ $type === 'albums' ? 'btn-primary' : 'btn-secondary' }}">Albums</a>
    </div>

    {{-- Zoekbalk --}}
    <form method="GET" class="mb-6 flex gap-2">
        <input type="hidden" name="type" value="{{ $type }}">
        <input name="q" type="text" placeholder="Zoeken..." value="{{ $query }}" class="form-control flex-grow" />
        <button type="submit" class="btn btn-primary">Zoeken</button>
    </form>

    {{-- Resultaten --}}
    @if(count($results) > 0)
        @foreach($results as $item)
            <div class="search-result flex items-center justify-between p-4 mb-3 border rounded">
                <div class="flex items-center gap-3">
                    <img src="{{ $type === 'songs' ? $item['album']['cover_small'] : $item['cover_small'] }}" width="60" class="rounded" />
                    <div>
                        <strong>{{ $item['title'] }}</strong><br>
                        <small>{{ $type === 'songs' ? $item['artist']['name'] : '' }}</small>
                    </div>
                </div>

                <div class="flex gap-2">
                    @if($type === 'songs')
                        <button class="btn btn-success" onclick="addSong('{{ $item['title'] }}', '{{ $item['artist']['name'] }}')">➕ Toevoegen</button>
                    @else
                        <button class="btn btn-success" onclick="addAlbum('{{ $item['title'] }}')">➕ Toevoegen</button>
                    @endif
                    <a href="{{ $item['link'] }}" target="_blank" class="btn btn-info">👁️ Bekijk</a>
                </div>
            </div>
        @endforeach
    @else
        <p>Geen resultaten gevonden.</p>
    @endif

    <div class="toast fixed top-5 right-5 bg-gray-800 text-white px-4 py-2 rounded" id="toast"></div>

</div>

<script>
function showToast(message) {
    const toast = document.getElementById('toast');
    toast.textContent = message;
    toast.classList.add('show');

    setTimeout(() => {
        toast.classList.remove('show');
    }, 2500);
}

function addSong(title, artist) {
    fetch("{{ route('search.songs.add') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ title, artist })
    }).then(res => res.json())
      .then(data => showToast(data.message))
      .catch(() => showToast("❌ Er ging iets mis…"));
}

function addAlbum(title) {
    fetch("{{ route('search.albums.add') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ title })
    }).then(res => res.json())
      .then(data => showToast(data.message))
      .catch(() => showToast("❌ Er ging iets mis…"));
}
</script>

@endsection
