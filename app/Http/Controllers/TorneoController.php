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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
