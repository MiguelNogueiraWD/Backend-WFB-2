<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chauffeur extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = [
        'chauffeur_nom', 
        'chauffeur_prenom', 
        'chauffeur_email', 
        'chauffeur_tel', 
        'chauffeur_adresse', 
        'chauffeur_statut', 
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'string',  // Assurez-vous que les casts sont correctement configurés
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
}
