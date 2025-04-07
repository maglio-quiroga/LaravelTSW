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
        Schema::create('noticias', function (Blueprint $table) {
            $table->id(); 
            $table->string('titulo');
            $table->string('imagen');
            $table->text('descripcion');
            $table->timestamps();
        });

        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_noticias')->constrained('noticias')->onDelete('cascade');
            $table->string('titulo');
            $table->string('imagen');
            $table->text('descripcion');
            $table->timestamps();
        });
            
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('destino');
            $table->string('categoria');
            $table->float('precio', 8, 2);
            $table->tinyInteger('duracion');
            $table->date('fecha_inicio');
            $table->time('horario_inicio');
            $table->timestamps();
        });

        Schema::create('preguntas_frecuentes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('texto');
            $table->timestamps();
        });

        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correo');
            $table->string('telefono');
            $table->date('fecha');
            $table->time('hora');
            $table->text('motivo');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
        Schema::dropIfExists('publicaciones');
        Schema::dropIfExists('actividades');
        Schema::dropIfExists('preguntas_frecuentes');
        Schema::dropIfExists('reservas');
    }
};
