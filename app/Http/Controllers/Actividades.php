<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;

class Actividades extends Controller
{
    public function LISTAR_ACTIVIDADES()
    {
        $actividades = Actividad::paginate(10); 
        return view('admin.actividades', compact('actividades'));
    }

    public function FORMULARIO_CREAR()
    {
        return view('actividades.crear');
    }

    public function GUARDAR_ACTIVIDAD(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'duracion' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'horario_inicio' => 'required|date_format:H:i',
        ]);

        $actividad = new Actividad();
        $actividad->nombre = $request->nombre;
        $actividad->destino = $request->destino;
        $actividad->categoria = $request->categoria;
        $actividad->precio = $request->precio;
        $actividad->duracion = $request->duracion;
        $actividad->fecha_inicio = $request->fecha_inicio;
        $actividad->horario_inicio = $request->horario_inicio;
        $actividad->save();

        return redirect()->route('actividades.listar')->with('exito', 'Actividad creada correctamente.');
    }

    public function FORMULARIO_EDITAR($id)
    {
        $actividad = Actividad::findOrFail($id);
        return view('actividades.editar', compact('actividad'));
    }

    public function ACTUALIZAR_ACTIVIDAD(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'duracion' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'horario_inicio' => 'required|time',
        ]);

        $actividad = Actividad::findOrFail($id);
        $actividad->nombre = $request->nombre;
        $actividad->destino = $request->destino;
        $actividad->categoria = $request->categoria;
        $actividad->precio = $request->precio;
        $actividad->duracion = $request->duracion;
        $actividad->fecha_inicio = $request->fecha_inicio;
        $actividad->horario_inicio = $request->horario_inicio;
        $actividad->save();

        return redirect()->route('actividades.listar')->with('exito', 'Actividad actualizada correctamente.');
    }

    public function ELIMINAR_ACTIVIDAD($id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->delete();

        return redirect()->route('actividades.listar')->with('exito', 'Actividad eliminada correctamente.');
    }
}