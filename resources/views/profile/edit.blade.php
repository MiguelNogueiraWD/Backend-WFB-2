    @extends('layouts.default')

    @section('content')
    <div class="container">
        <h1>Éditer Profil</h1>
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
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            <div class="form-group">
                <label for="utilisateur_nom">Nom</label>
                <input type="text" class="form-control" id="utilisateur_nom" name="utilisateur_nom" value="{{ $user->utilisateur_nom }}" required>
            </div>
            <div class="form-group">
                <label for="utilisateur_prenom">Prénom</label>
                <input type="text" class="form-control" id="utilisateur_prenom" name="utilisateur_prenom" value="{{ $user->utilisateur_prenom }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="utilisateur_tel">numéro de téléphone</label>
                <input type="text" class="form-control" id="utilisateur_tel" name="utilisateur_tel" value="{{ $user->utilisateur_tel }}" required>
            </div>
            <div class="form-group">
                <label for="utilisateur_adresse">Adresse</label>
                <input type="text" class="form-control" id="utilisateur_adresse" name="utilisateur_adresse" value="{{ $user->utilisateur_adresse }}" required>
            </div>
            <button type="submit" class="btn btn-success">Sauvegarder les changements</button>
        </form>
    </div>
    @endsection
