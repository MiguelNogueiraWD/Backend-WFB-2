<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_nom',
        'client_type'
    ];

    public function contrats()
    {
        return $this->hasMany(Contrat::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
