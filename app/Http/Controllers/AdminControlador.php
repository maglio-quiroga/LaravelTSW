<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Publicacion;
use App\Models\Actividad;
use App\Models\PreguntaFrequente;
use App\Models\Reserva;

class AdminControlador extends Controller
{
    public function admin(){
        $noticias           = Noticia::paginate(10);
        $publicaciones      = Publicacion::paginate(10);
        $actividades        = Actividad::paginate(10);
        $preguntasFrecuentes = PreguntaFrequente::paginate(10);
        $reservas           = Reserva::paginate(10);

        return view('admin.admin', compact('noticias','publicaciones','actividades','preguntasFrecuentes','reservas'));
    }
}
