@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h1">Bewerk User</h1>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="mt-4">
        @csrf
        @method('PATCH')

        <div class="field">
            <label>Naam</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="field">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="field">
            <label>Rol</label>
            <select name="role" required>
                <option value="user" @if($user->role === 'user') selected @endif>User</option>
                <option value="member" @if($user->role === 'member') selected @endif>Member</option>
                <option value="admin" @if($user->role === 'admin') selected @endif>Admin</option>
            </select>
        </div>

        <div class="field">
            <label>Wachtwoord (laat leeg om niet te wijzigen)</label>
            <input type="password" name="password">
        </div>

        <div class="field">
            <label>Bevestig Wachtwoord</label>
            <input type="password" name="password_confirmation">
        </div>

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Opslaan</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-ghost">Annuleer</a>
        </div>
    </form>
</div>
@endsection
