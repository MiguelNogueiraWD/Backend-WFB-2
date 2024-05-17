<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'heure_debut',
        'heure_fin',
        'statut_mission',
        'details_mission',
        'bus_id',
        'chauffeur_id',
        'vol_id',
        'heure_commencee',
        'heure_terminee'
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function chauffeur()
    {
        return $this->belongsTo(Chauffeur::class);
    }

    public function vol()
    {
        return $this->belongsTo(Vol::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
