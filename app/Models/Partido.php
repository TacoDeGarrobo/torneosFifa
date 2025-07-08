<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;
    protected $fillable = [
        'equipo_local_id',
        'equipo_visitante_id',
        'goles_local',
        'goles_visitante',
        'torneo_id'
    ];
    /**
     * Get the torneo that owns the partido.
     */
    public function torneo()
    {
        return $this->belongsTo(Torneo::class);
    }
    /**
     * Get the equipo local for the partido.
     */
    public function equipoLocal()
    {
        return $this->belongsTo(Equipo::class, 'equipo_local_id');
    }
    /**
     * Get the equipo visitante for the partido.
     */
    public function equipoVisitante()
    {
        return $this->belongsTo(Equipo::class, 'equipo_visitante_id');
    }
}
