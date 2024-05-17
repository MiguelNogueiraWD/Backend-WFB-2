@extends('layouts.default')

@section('content')
<div class="container">
    <h1>Mes Missions</h1>
    <form method="GET" action="{{ route('chauffeur.missions.index') }}" class="mb-3">
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
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
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
                <td>{{ $mission->date }}</td>
                <td>{{ $mission->bus->immatriculation }}</td>
                <td>{{ $mission->vol->provenance }} - {{ $mission->vol->destination }}</td>
                <td>{{ $mission->heure_debut }}</td>
                <td>{{ $mission->heure_fin }}</td>
                <td>
                    @if($mission->date == now()->toDateString())
                        @if($mission->statut_mission == 'en cours')
                            <form action="{{ route('chauffeur.missions.stop', $mission->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">Terminer</button>
                            </form>
                        @elseif($mission->statut_mission != 'terminée')
                            <form action="{{ route('chauffeur.missions.start', $mission->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">Démarrer</button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('chauffeur.missions.show', $mission->id) }}" class="btn btn-info">Voir Détails</a>
                        @if($mission->statut_mission == 'abandonnée')
                            <span class="text-danger">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Abandonnée
                            </span>
                        @endif
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
