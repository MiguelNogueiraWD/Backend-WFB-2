<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'commentaire',
        'mission_id'
    ];

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }
}
