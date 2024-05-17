<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_date',
        'reservation_statut',
        'client_id',
        'mission_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
}
