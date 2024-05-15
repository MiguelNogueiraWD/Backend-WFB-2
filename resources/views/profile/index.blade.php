@extends('layouts.default')

@section('content')
<div class="container">
    <h1>Profil de l'utilisateur</h1>
    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Éditer Profil</a>
    <a href="{{ route('profile.editpassword') }}" class="btn btn-primary">Changer mot de passe</a>
    <a href="{{ route('missions.index') }}" class="btn btn-primary">Voir les Missions</a>
    <a href="{{ route('missions.create') }}" class="btn btn-primary">Attribuer une Mission</a>
    <form method="POST" action="">
        @csrf
        <button type="submit" class="btn btn-danger">Déconnecter</button>
    </form>
</div>
@endsection
