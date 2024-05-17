<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthenticationChauffeur extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'jeton_authentification',
        'dernier_login',
        'chauffeur_id'
    ];

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }
}
