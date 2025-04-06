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

class Actividades extends Controller
{
    public function LISTAR_ACTIVIDADES()
    {
        $actividades = Actividad::all();
        return view('admin.actividades.index', compact('actividades'));
    }

    public function FORMULARIO_CREAR()
    {
        return view('admin.actividades.crear');
    }

    public function GUARDAR_ACTIVIDAD(Request $request)
    {
        $actividad = new Actividad();
        $actividad->nombre = $request->nombre;
        $actividad->destino = $request->destino;
        $actividad->categoria = $request->categoria;
        $actividad->precio = $request->precio;
        $actividad->duracion = $request->duracion;
        $actividad->fecha_inicio = $request->fecha_inicio;
        $actividad->horario_inicio = $request->horario_inicio;
        $actividad->save();

        return redirect()->route('admin.actividades.listar')->with('exito', 'Actividad creada correctamente.');
    }

    public function FORMULARIO_EDITAR($id)
    {
        $actividad = Actividad::findOrFail($id);
        return view('admin.actividades.editar', compact('actividad'));
    }

    public function ACTUALIZAR_ACTIVIDAD(Request $request, $id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->nombre = $request->nombre;
        $actividad->destino = $request->destino;
        $actividad->categoria = $request->categoria;
        $actividad->precio = $request->precio;
        $actividad->duracion = $request->duracion;
        $actividad->fecha_inicio = $request->fecha_inicio;
        $actividad->horario_inicio = $request->horario_inicio;
        $actividad->save();

        return redirect()->route('admin.actividades.listar')->with('exito', 'Actividad actualizada correctamente.');
    }

    public function ELIMINAR_ACTIVIDAD($id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->delete();

        return redirect()->route('admin.actividades.listar')->with('exito', 'Actividad eliminada correctamente.');
    }

    public function MOSTRAR_ACTIVIDAD($id)
    {
        $actividad = Actividad::findOrFail($id);
        return view('admin.actividades.mostrar', compact('actividad'));
    }
}
