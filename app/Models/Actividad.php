<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';

    protected $fillable = [
        'nombre',
        'destino',
        'categoria',
        'precio',
        'duracion',
        'fecha_inicio',
        'horario_inicio',
    ];
}

