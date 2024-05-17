<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Chauffeur;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class AuthController extends Controller
{
    public function login(){
        return view("auth.connexion");
    }


    function loginPost(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);
        
        $credentials = $request->only("email", "password");
        if(Auth::attempt($credentials)){
            return redirect()->intended(route("profile"));
        }
        return redirect()->intended(route("login"))->with("error","Connexion échoué");
    }


    public function register(){
        return view("auth.inscription");
    }

    function registerPost(Request $request){
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "email" => "required|email",
            "adresse" => "required",
            "tel" => "required",
            "mdp" => "required|confirmed",
        ]);

        $utilisateur = new User();
        $utilisateur->utilisateur_nom = $request->nom;
        $utilisateur->utilisateur_prenom = $request->prenom;
        $utilisateur->email = $request->email;
        $utilisateur->utilisateur_tel = $request->tel;
        $utilisateur->utilisateur_adresse = $request->adresse;
        $utilisateur->password = Hash::make($request->mdp);

        if ($utilisateur->save()){
            return redirect(route("login"))->with("success","Compte créé avec succès.");
        }

        return redirect(route("register"))->with("error","Echec de la création de votre compte");
    }

    public function loginChauffeur(){
        return view("auth.connexion_chauffeur");
    }



    public function loginChauffeurPost(Request $request){
        $credentials = $request->validate([
            "chauffeur_email" => "required|email",
            "password" => "required",
        ]);
    
        // Essayez d'authentifier le chauffeur
        if (Auth::guard('chauffeur')->attempt(['chauffeur_email' => $request->chauffeur_email, 'password' => $request->password])) {
            return redirect()->intended(route("chauffeur.profile")); // Rediriger vers le tableau de bord du chauffeur
        }

        // Retourner à la vue de connexion avec une erreur
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ]);
    }
    




    public function registerChauffeur(){
        return view("auth.inscription_chauffeur");
    }

    function registerChauffeurPost(Request $request){
        
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "email" => "required|email",
            "adresse" => "required",
            "tel" => "required",
            "password" => "required|confirmed",
        ]);

        $chauffeur = new Chauffeur();
        $chauffeur->chauffeur_nom = $request->nom;
        $chauffeur->chauffeur_prenom = $request->prenom;
        $chauffeur->chauffeur_email = $request->email;
        $chauffeur->chauffeur_tel = $request->tel;
        $chauffeur->chauffeur_adresse = $request->adresse;
        $chauffeur->chauffeur_statut = "";
        $chauffeur->password = Hash::make($request->password);

        if ($chauffeur->save()){
            return redirect(route("login_chauffeur"))->with("success","Compte chauffeur créé avec succès.");
        }

        return back()->with("error", "Échec de la création de votre compte");
    }

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

}
