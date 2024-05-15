@extends('layouts.default')

@section('content')
<div class="container">
    <h1>Modifier la mission</h1>
    <form action="{{ route('missions.update', $mission->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="heure_debut">Heure de début</label>
            <input type="time" name="heure_debut" class="form-control" value="{{ $mission->heure_debut }}" required>
        </div>
        <div class="form-group">
            <label for="heure_fin">Heure de fin</label>
            <input type="time" name="heure_fin" class="form-control" value="{{ $mission->heure_fin }}" required>
        </div>
        <div class="form-group">
            <label for="details_mission">Détails de la mission</label>
            <textarea name="details_mission" class="form-control" required>{{ $mission->details_mission }}</textarea>
        </div>
        <div class="form-group">
            <label for="chauffeur_id">Chauffeur</label>
            <select name="chauffeur_id" class="form-control" required>
                <option value="">Choisir un chauffeur</option>
                @foreach($chauffeurs as $chauffeur)
                    <option value="{{ $chauffeur->id }}" @if($chauffeur->id == $mission->chauffeur_id) selected @endif>{{ $chauffeur->chauffeur_nom }} {{ $chauffeur->chauffeur_prenom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="bus_id">Bus</label>
            <select name="bus_id" class="form-control" required>
                <option value="">Choisir un bus</option>
                @foreach($buses as $bus)
                    <option value="{{ $bus->id }}" @if($bus->id == $mission->bus_id) selected @endif>{{ $bus->immatriculation }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="vol_id">Vol</label>
            <select name="vol_id" class="form-control" required>
                <option value="">Choisir un vol</option>
                @foreach($vols as $vol)
                    <option value="{{ $vol->id }}" @if($vol->id == $mission->vol_id) selected @endif>{{ $vol->provenance }} - {{ $vol->destination }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
