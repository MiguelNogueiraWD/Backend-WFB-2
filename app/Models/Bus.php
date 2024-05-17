<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque',
        'modele',
        'immatriculation',
        'capacite',
        'statut'
    ];

    public function missions()
    {
        return $this->hasMany(Mission::class);
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }
}
