<?php

namespace App\Http\Controllers;
use App\Models\Chauffeur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $chauffeurs = Chauffeur::all();
    return view('dashboard.index', compact('chauffeurs'));
}
}
