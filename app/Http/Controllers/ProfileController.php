<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); 
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'utilisateur_nom' => 'required|string|max:255',
            'utilisateur_prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'utilisateur_tel' => 'required|string|max:255',
            'utilisateur_adresse' => 'required|string|max:255'
        ]);

        // Mise à jour des données de l'utilisateur
        $user->update($request->all());
        return redirect()->route('profile.edit')->with('success', 'Profil mis à jour avec succès.');
    }


    public function editpassword()
    {
        return view('profile.editpassword');
    }

    public function updatepassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        
        // Vérifier si le mot de passe actuel est correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel n\'est pas correct.']);
        }
    
        // Mise à jour du mot de passe
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        return redirect()->route('profile.editpassword')->with('success', 'Mot de passe mis à jour avec succès.');
    }

    public function editChauffeur()
    {
        $chauffeur = Auth::guard('chauffeur')->user(); 
        return view('chauffeur.profile.edit', compact('chauffeur'));
    }
    
    public function updateChauffeur(Request $request)
    {
        $chauffeur = Auth::guard('chauffeur')->user();
        $request->validate([
            'chauffeur_nom' => 'required|string|max:255',
            'chauffeur_prenom' => 'required|string|max:255',
            'chauffeur_email' => 'required|string|email|max:255|unique:chauffeurs,chauffeur_email,' . $chauffeur->id,
            'chauffeur_tel' => 'required|string|max:255',
            'chauffeur_adresse' => 'required|string|max:255'
        ]);
    
        $chauffeur->update($request->all());
        return redirect()->route('chauffeur.profile.edit')->with('success', 'Profil mis à jour avec succès.');
    }
    
    public function editPasswordChauffeur()
    {
        return view('chauffeur.profile.editpassword');
    }
    
    public function updatePasswordChauffeur(Request $request)
    {
        $chauffeur = Auth::guard('chauffeur')->user();
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        
        if (!Hash::check($request->current_password, $chauffeur->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel n\'est pas correct.']);
        }
    
        $chauffeur->password = Hash::make($request->new_password);
        $chauffeur->save();
    
        return redirect()->route('chauffeur.profile.editpassword')->with('success', 'Mot de passe mis à jour avec succès.');
    }
    
}


