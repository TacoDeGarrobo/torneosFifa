<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TorneoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PartidoController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos.index');
    Route::get('/torneos/create', [TorneoController::class, 'create'])->name('torneos.create');
    Route::get('/torneos/getMaxEquipos', [TorneoController::class, 'getMaxEquipos'])->name('getMaxEquipos');
    Route::post('/torneos', [TorneoController::class, 'store'])->name('torneos.store');
    Route::get('/torneos/{torneo}', [TorneoController::class, 'show'])->name('torneos.show');
    Route::get('/torneos/{torneo}/edit', [TorneoController::class, 'edit'])->name('torneos.edit');
    Route::put('/torneos/{torneo}', [TorneoController::class, 'update'])->name('torneos.update');
    Route::delete('/torneos/{torneo}', [TorneoController::class, 'destroy'])->name('torneos.destroy');
    Route::get('/torneos/{torneo}/equipos', [EquipoController::class, 'index'])->name('equipos.index');
    Route::get('/torneos/{torneo}/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');
    Route::post('/torneos/{torneo}/equipos', [EquipoController::class, 'store'])->name('equipos.store');
    Route::get('/torneos/{torneo}/equipos/{equipo}', [EquipoController::class, 'show'])->name('equipos.show');
    Route::get('/torneos/{torneo}/equipos/{equipo}/edit', [EquipoController::class, 'edit'])->name('equipos.edit');
    Route::put('/torneos/{torneo}/equipos/{equipo}', [EquipoController::class, 'update'])->name('equipos.update');
    Route::delete('/torneos/{torneo}/equipos/{equipo}', [EquipoController::class, 'destroy'])->name('equipos.destroy');
    Route::get('/torneos/{torneo}/partidos', [PartidoController::class, 'index'])->name('partidos.index');
    Route::get('/torneos/{torneo}/partidos/create', [PartidoController::class, 'create'])->name('partidos.create');
    Route::post('/torneos/{torneo}/partidos', [PartidoController::class, 'store'])->name('partidos.store');
    Route::get('/torneos/{torneo}/partidos/{partido}', [PartidoController::class, 'show'])->name('partidos.show');
    Route::get('/torneos/{torneo}/partidos/{partido}/edit', [PartidoController::class, 'edit'])->name('partidos.edit');
    Route::put('/torneos/{torneo}/partidos/{partido}', [PartidoController::class, 'update'])->name('partidos.update');
    Route::delete('/torneos/{torneo}/partidos/{partido}', [PartidoController::class, 'destroy'])->name('partidos.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
