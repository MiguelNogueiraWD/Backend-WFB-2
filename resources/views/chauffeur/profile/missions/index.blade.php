@extends('layouts.default')

@section('content')
<div class="container">
    <h1>Mes Missions</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
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
                <td>{{ $mission->bus->immatriculation }}</td>
                <td>{{ $mission->vol->provenance }} - {{ $mission->vol->destination }}</td>
                <td>{{ $mission->heure_debut }}</td>
                <td>{{ $mission->heure_fin }}</td>
                <td>
                    <a href="{{ route('chauffeur.missions.show', $mission->id) }}" class="btn btn-info">Voir Détails</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
