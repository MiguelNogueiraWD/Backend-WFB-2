@extends("layouts.default")
@section("title", "Liste des chauffeurs")
@section("content")
<div class="container">
    <h1>Tableau de Bord des Chauffeurs</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Numéro de téléphone</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chauffeurs as $chauffeur)
                <tr>
                    <td>{{ $chauffeur->chauffeur_nom }}</td>
                    <td>{{ $chauffeur->chauffeur_prenom }}</td>
                    <td>{{ $chauffeur->chauffeur_email }}</td>
                    <td>{{ $chauffeur->chauffeur_tel }}</td>
                    <td>{{ $chauffeur->chauffeur_statut }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection