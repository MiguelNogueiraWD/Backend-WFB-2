<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    use HasFactory;

    protected $fillable = [
        'provenance',
        'destination',
        'heure_arrivee',
        'heure_depart'
    ];

    public function missions()
    {
        return $this->hasMany(Mission::class);
    }
}
