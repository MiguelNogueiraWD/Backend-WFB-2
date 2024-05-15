<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'incident_description',
        'incident_date',
        'resolu',
        'bus_id'
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
