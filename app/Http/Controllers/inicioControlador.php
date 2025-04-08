<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Publicacion;
use App\Models\Actividad;
use App\Models\PreguntaFrequente;
use App\Models\Reserva;

class InicioControlador extends Controller
{
    //
    public function inicio(){
        $noticias = Noticia::all();
        $publicaciones = Publicacion::all();
        $actividades = Actividad::all();
        $faqs = PreguntaFrequente::all();

        return view('inicio.inicio', compact('noticias','publicaciones','actividades','faqs'));
    }

    public function enviarPeticion(Request $request){

      
        $credenciales = [
            'nombre'  => $request->post('nombre'),
            'correo'  => $request->post('correo'),
            'telefono'=> $request->post('telefono'),
            'fecha'   => $request->post('fecha'),
            'hora'    => $request->post('hora'),
            'motivo'  => $request->post('motivo'),
        ];

        // Crear y guardar la reserva
        Reserva::create($credenciales);

        // Redireccionar a la página de inicio con un mensaje de éxito
        return redirect()->route('inicio');
    
    }
}
