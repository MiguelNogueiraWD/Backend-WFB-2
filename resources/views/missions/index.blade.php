@extends('layouts.default')

@section('content')
<div class="container">
    <h1>Liste des Missions</h1>
    <form method="GET" action="{{ route('missions.index') }}" class="mb-3">
        <div class="form-row">
            <div class="col">
                <label for="filter">Filtrer par:</label>
                <select name="filter" id="filter" class="form-control">
                    <option value="today" {{ $filter == 'today' ? 'selected' : '' }}>Missions d'aujourd'hui</option>
                    <option value="past" {{ $filter == 'past' ? 'selected' : '' }}>Missions passées</option>
                    <option value="future" {{ $filter == 'future' ? 'selected' : '' }}>Missions à venir</option>
                </select>
            </div>
            <div class="col">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-primary form-control">Filtrer</button>
            </div>
        </div>
    </form>
    <a href="{{ route('missions.create') }}" class="btn btn-primary mb-3">Créer une nouvelle mission</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Chauffeur</th>
                <th>Bus</th>
                <th>Vol</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($missions as $mission)
            <tr>
                <td>{{ $mission->id }}</td>
                <td>{{ $mission->date }}</td>
                <td>{{ $mission->chauffeur->chauffeur_nom }} {{ $mission->chauffeur->chauffeur_prenom }}</td>
                <td>{{ $mission->bus->immatriculation }}</td>
                <td>{{ $mission->vol->provenance }} - {{ $mission->vol->destination }}</td>
                <td>{{ $mission->heure_debut }}</td>
                <td>{{ $mission->heure_fin }}</td>
                <td>
                    @if($mission->statut_mission == 'abandonnée')
                        <span class="text-danger">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Abandonnée
                        </span>
                    @else
                        {{ $mission->statut_mission }}
                    @endif
                </td>
                <td>
                    <a href="{{ route('missions.edit', $mission->id) }}" class="btn btn-warning">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
