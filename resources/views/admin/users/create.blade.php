@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="h1">Nieuwe User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="field">
            <label>Naam</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="field">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="field">
            <label>Rol</label>
            <select name="role" required>
                <option value="user">User</option>
                <option value="member">Member</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div class="field">
            <label>Wachtwoord</label>
            <input type="password" name="password" required>
        </div>

        <div class="field">
            <label>Bevestig Wachtwoord</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Opslaan</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-ghost">Annuleer</a>
        </div>
    </form>
</div>
@endsection
