@extends('layouts.app')

@section('content')
<h1>Wijzig rol: {{ $user->name }}</h1>
<form method="POST" action="{{ route('admin.users.update', $user) }}">
    @csrf @method('PUT')
    <label>Rol</label>
    <select name="role">
        @foreach($roles as $r)
            <option value="{{ $r }}" @selected($user->role == $r)>{{ ucfirst($r) }}</option>
        @endforeach
    </select>
    <button type="submit">Opslaan</button>
</form>
@endsection
