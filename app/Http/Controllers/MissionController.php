<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Chauffeur;
use App\Models\Bus;
use App\Models\Vol;

class MissionController extends Controller
{
    public function index()
    {
        $missions = Mission::with('chauffeur', 'bus', 'vol')->get();
        return view('missions.index', compact('missions'));
    }

    public function create()
    {
        $chauffeurs = Chauffeur::all();
        $buses = Bus::all();
        $vols = Vol::all();
        return view('missions.create', compact('chauffeurs', 'buses', 'vols'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i',
            'details_mission' => 'required|string',
            'chauffeur_id' => 'required|exists:chauffeurs,id',
            'bus_id' => 'required|exists:buses,id',
            'vol_id' => 'required|exists:vols,id',
        ]);

        Mission::create($request->all());
        return redirect()->route('missions.index')->with('success', 'Mission créée avec succès');
    }

    public function edit(Mission $mission)
    {
        $chauffeurs = Chauffeur::all();
        $buses = Bus::all();
        $vols = Vol::all();
        return view('missions.edit', compact('mission', 'chauffeurs', 'buses', 'vols'));
    }

    public function update(Request $request, Mission $mission)
    {
        $request->validate([
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i',
            'details_mission' => 'required|string',
            'chauffeur_id' => 'required|exists:chauffeurs,id',
            'bus_id' => 'required|exists:buses,id',
            'vol_id' => 'required|exists:vols,id',
        ]);

        $mission->update($request->all());
        return redirect()->route('missions.index')->with('success', 'Mission mise à jour avec succès');
    }

    public function chauffeurIndex()
    {
        $chauffeurId = auth()->user()->id;
        $missions = Mission::where('chauffeur_id', $chauffeurId)->get();
        return view('chauffeur.profile.missions.index', compact('missions'));
    }

    public function show(Mission $mission)
    {
        return view('chauffeur.profile.missions.show', compact('mission'));
    }
}
