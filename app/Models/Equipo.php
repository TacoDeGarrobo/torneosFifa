<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 
    'torneo_id'
    ];
    /**
     * Get the torneo that owns the equipo.
     */
    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }
    
}
