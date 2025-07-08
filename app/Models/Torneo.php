<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre',
    'user_id'
    ];
    /**
     * Get the user that owns the torneo.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the equipos for the torneo.
     */
    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
    /**
     * Get the partidos for the torneo.
     */
    public function partidos()
    {
        return $this->hasMany(Partido::class);
    }
    /**
     * The users that belong to the torneo.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
}
