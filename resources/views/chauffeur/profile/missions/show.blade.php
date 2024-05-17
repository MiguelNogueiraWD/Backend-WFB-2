@extends('layouts.default')

@section('content')
<div class="container">
    <h1>Détails de la Mission</h1>
    <div class="card">
        <div class="card-header">
            Mission #{{ $mission->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Détails de la mission</h5>
            <p class="card-text"><strong>Bus:</strong> {{ $mission->bus->immatriculation }}</p>
            <p class="card-text"><strong>Vol:</strong> {{ $mission->vol->provenance }} - {{ $mission->vol->destination }}</p>
            <p class="card-text"><strong>Heure de début:</strong> {{ $mission->heure_debut }}</p>
            <p class="card-text"><strong>Heure de fin:</strong> {{ $mission->heure_fin }}</p>
            <p class="card-text"><strong>Statut:</strong> {{ $mission->statut_mission }}</p>
            <p class="card-text"><strong>Détails:</strong> {{ $mission->details_mission }}</p>
        </div>
    </div>
</div>
@endsection
