<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use Illuminate\Http\Request;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $torneos = Torneo::with('user')->get();
        return view('torneos.index', compact('torneos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('torneos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|in:liga,eliminatoria,liga y eliminatoria,UCL',
            'max_equipos' => 'required|integer|min:2|max:32',
        ]);

        $torneo = new Torneo();
        $torneo->nombre = $request->nombre;
        $torneo->user_id = auth()->id();
        $torneo->tipo = $request->tipo;
        $torneo->max_equipos = $request->max_equipos;
        $torneo->equipos_participantes = 0; // Inicialmente no hay equipos inscritos
        $torneo->save();

        return redirect()->route('torneos.index')->with('success', 'Torneo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function showForm()
    {
        $TiposTorneo = [
            'liga' => 'Liga',
            'eliminatoria' => 'Eliminatoria',
            'liga_y_eliminatoria' => 'Liga y Eliminatoria',
            'UCL' => 'UCL',
        ];
        return view('torneos.create', compact('TiposTorneo'));
    }

    /**
     * Display the specified resource.
     */
    public function getMaxEquipos(Request $request)
    {
        $tipoId = $request->input('tipo');
        $cantidad=[];
        if ($tipoId == 'liga') {
            $cantidad = [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32];
        } elseif ($tipoId == 'eliminatoria') {
            $cantidad = [4, 8, 16, 32];
        } elseif ($tipoId == 'liga y eliminatoria') {
            $cantidad = [4, 6, 8, 10, 12, 14, 16];
        } elseif ($tipoId == 'UCL') {
            $cantidad = [32];
        }

        return response()->json([$cantidad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
