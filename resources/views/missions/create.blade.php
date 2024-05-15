@extends('layouts.default')

@section('content')
<div class="container">
    <h1>Créer une nouvelle mission</h1>
    <form action="{{ route('missions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="heure_debut">Heure de début</label>
            <input type="time" name="heure_debut" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="heure_fin">Heure de fin</label>
            <input type="time" name="heure_fin" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="details_mission">Détails de la mission</label>
            <textarea name="details_mission" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="chauffeur_id">Chauffeur</label>
            <select name="chauffeur_id" class="form-control" required>
                <option value="">Choisir un chauffeur</option>
                @foreach($chauffeurs as $chauffeur)
                    <option value="{{ $chauffeur->id }}">{{ $chauffeur->chauffeur_nom }} {{ $chauffeur->chauffeur_prenom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="bus_id">Bus</label>
            <select name="bus_id" class="form-control" required>
                <option value="">Choisir un bus</option>
                @foreach($buses as $bus)
                    <option value="{{ $bus->id }}">{{ $bus->immatriculation }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="vol_id">Vol</label>
            <select name="vol_id" class="form-control" required>
                <option value="">Choisir un vol</option>
                @foreach($vols as $vol)
                    <option value="{{ $vol->id }}">{{ $vol->provenance }} - {{ $vol->destination }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
