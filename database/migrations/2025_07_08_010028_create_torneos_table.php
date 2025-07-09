<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('tipo'); // tipo de torneo: liga, eliminatoria, liga y eliminatoria o UCL
            $table->string('estado')->default('activo'); // activo, inactivo, finalizado
            $table->integer('max_equipos')->default(16); // Número máximo de equipos permitidos
            $table->integer('equipos_participantes')->default(0); // Equipos inscritos actualmente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('torneos');
    }
};
