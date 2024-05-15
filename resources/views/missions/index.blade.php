@extends('layouts.default')

@section('content')
<div class="container">
    <h1>Liste des Missions</h1>
    <a href="{{ route('missions.create') }}" class="btn btn-primary mb-3">Créer une nouvelle mission</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Chauffeur</th>
                <th>Bus</th>
                <th>Vol</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($missions as $mission)
            <tr>
                <td>{{ $mission->id }}</td>
                <td>{{ $mission->chauffeur->chauffeur_nom }} {{ $mission->chauffeur->chauffeur_prenom }}</td>
                <td>{{ $mission->bus->immatriculation }}</td>
                <td>{{ $mission->vol->provenance }} - {{ $mission->vol->destination }}</td>
                <td>{{ $mission->heure_debut }}</td>
                <td>{{ $mission->heure_fin }}</td>
                <td>
                    <a href="{{ route('missions.edit', $mission->id) }}" class="btn btn-warning">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
