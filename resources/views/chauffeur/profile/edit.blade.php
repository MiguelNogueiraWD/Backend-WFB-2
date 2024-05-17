@extends('layouts.default')

@section('content')
<div class="container">
    <h1>Éditer Profil Chauffeur</h1>
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
    <form method="POST" action="{{ route('chauffeur.profile.update') }}">
        @csrf
        <div class="form-group">
            <label for="chauffeur_nom">Nom</label>
            <input type="text" class="form-control" id="chauffeur_nom" name="chauffeur_nom" value="{{ $chauffeur->chauffeur_nom }}" required>
        </div>
        <div class="form-group">
            <label for="chauffeur_prenom">Prénom</label>
            <input type="text" class="form-control" id="chauffeur_prenom" name="chauffeur_prenom" value="{{ $chauffeur->chauffeur_prenom }}" required>
        </div>
        <div class="form-group">
            <label for="chauffeur_email">Email</label>
            <input type="email" class="form-control" id="chauffeur_email" name="chauffeur_email" value="{{ $chauffeur->chauffeur_email }}" required>
        </div>
        <div class="form-group">
            <label for="chauffeur_tel">Numéro de Téléphone</label>
            <input type="text" class="form-control" id="chauffeur_tel" name="chauffeur_tel" value="{{ $chauffeur->chauffeur_tel }}" required>
        </div>
        <div class="form-group">
            <label for="chauffeur_adresse">Adresse</label>
            <input type="text" class="form-control" id="chauffeur_adresse" name="chauffeur_adresse" value="{{ $chauffeur->chauffeur_adresse }}" required>
        </div>
        <button type="submit" class="btn btn-success">Sauvegarder les changements</button>
    </form>
</div>
@endsection
