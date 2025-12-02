@extends('layouts.app')

@section('content')
<h1>Gebruikers</h1>
@if(session('success')) <div>{{ session('success') }}</div> @endif

<table class="table">
    <thead><tr><th>Naam</th><th>Email</th><th>Rol</th><th>Acties</th></tr></thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <a href="{{ route('admin.users.edit', $user) }}">Wijzig rol</a>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Verwijderen?')">Verwijder</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
