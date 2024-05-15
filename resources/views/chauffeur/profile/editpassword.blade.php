@extends('layouts.default')

@section('content')
<div class="container">
    <h1>Changer Mot de Passe Chauffeur</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form method="POST" action="{{ route('chauffeur.profile.updatepassword') }}">
        @csrf
        <div class="form-group">
            <label for="current_password">Mot de Passe Actuel</label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
        </div>
        <div class="form-group">
            <label for="new_password">Nouveau Mot de Passe</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <div class="form-group">
            <label for="new_password_confirmation">Confirmer Nouveau Mot de Passe</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour le mot de passe</button>
    </form>
</div>
@endsection
