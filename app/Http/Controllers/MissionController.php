<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Chauffeur;
use App\Models\Bus;
use App\Models\Vol;
use Carbon\Carbon;

class MissionController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', 'today');
        $missions = $this->getMissionsByFilter($filter);

        return view('missions.index', compact('missions', 'filter'));
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
            'date' => 'required|date',
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
            'date' => 'required|date',
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

    public function chauffeurIndex(Request $request)
    {
        $chauffeurId = auth()->user()->id;
        $filter = $request->input('filter', 'today');
        $missions = $this->getMissionsByFilter($filter, $chauffeurId);

        return view('chauffeur.profile.missions.index', compact('missions', 'filter'));
    }

    public function show(Mission $mission)
    {
        return view('chauffeur.profile.missions.show', compact('mission'));
    }

    private function getMissionsByFilter($filter, $chauffeurId = null)
    {
        $query = Mission::query();

        if ($chauffeurId) {
            $query->where('chauffeur_id', $chauffeurId);
        }

        switch ($filter) {
            case 'past':
                $query->whereDate('date', '<', now()->toDateString())
                      ->orderBy('date', 'desc');
                break;

            case 'future':
                $query->whereDate('date', '>', now()->toDateString())
                      ->orderBy('date', 'asc');
                break;

            case 'today':
            default:
                $query->whereDate('date', now()->toDateString());
                break;
        }

        return $query->get();
    }


    public function startMission(Mission $mission)
    {
        $chauffeurId = auth()->user()->id;
        $activeMission = Mission::where('chauffeur_id', $chauffeurId)
            ->where('statut_mission', 'en cours')
            ->first();

        if ($activeMission) {
            return redirect()->back()->withErrors('Vous avez déjà une mission en cours.');
        }

        $mission->update([
            'statut_mission' => 'en cours',
            'heure_commencee' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Mission démarrée avec succès.');
    }


    public function stopMission(Mission $mission)
    {
        $mission->update([
            'statut_mission' => 'terminée',
            'heure_terminee' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Mission terminée avec succès.');
    }
}
