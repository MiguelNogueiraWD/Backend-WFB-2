@extends('layouts.default')

@section('content')
<div class="container">
    <h1>Profil du Chauffeur</h1>
    <a href="{{ route('chauffeur.profile.edit') }}" class="btn btn-primary">Éditer Profil</a>
    <a href="{{ route('chauffeur.profile.editpassword') }}" class="btn btn-primary">Changer Mot de Passe</a>
    <a href="{{ route('chauffeur.missions.index') }}" class="btn btn-primary">Voir Mes Missions</a>
    <form method="POST" action="{{ route('chauffeur_logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Déconnecter</button>
    </form>
</div>
@endsection
