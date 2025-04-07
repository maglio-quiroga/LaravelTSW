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

    public function publicaciones(){
        $publicaciones = Publicacion::all();
        $noticias = Noticia::all();

        return view('admin.publicaciones', compact('publicaciones','noticias'));
    }

    public function modificarPublicacion(int $id){
        $publicacion = Publicacion::find($id);
        $noticias = Noticia::all();

        return view('admin.modificar-publicaciones', compact('publicacion','noticias'));
    }

    public function crearPublicacion(Request $request){
        $validatedData = $request->validate([
            'titulo'      => 'required|string|max:255',
            'imagen'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'descripcion' => 'required|string',
            'id_noticias' => 'required|exists:noticias,id',
        ]);

        if ($request->hasFile('imagen')) {
            $imageName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('img'), $imageName);
            $validatedData['imagen'] = 'img/' . $imageName; //hay que usar un helper para entrar en public y despues poner la ruta relativa
        }

        Publicacion::create($validatedData);
        return redirect()->back()->with('success', 'Publicación creada exitosamente.');
    }

    public function eliminarPublicacion(Request $request){
        $objetivo = $request->post('id_publicacion');
        Publicacion::destroy($objetivo);

        return redirect()->route('publicaciones');
    }

    public function actualizarPublicacion(Request $request){
    $validatedData = $request->validate([
        'id_publicacion' => 'required|exists:publicaciones,id',
        'titulo'         => 'required|string|max:255',
        'imagen'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'descripcion'    => 'required|string',
        'id_noticias'    => 'required|exists:noticias,id',
    ]);

    $publicacion = Publicacion::findOrFail($validatedData['id_publicacion']);

    if ($request->hasFile('imagen')) {
        $imageName = time() . '.' . $request->imagen->extension();
        $request->imagen->move(public_path('img'), $imageName);
        $validatedData['imagen'] = 'img/' . $imageName;
    } else {
        unset($validatedData['imagen']);
    }

    $publicacion->update($validatedData);
    return redirect()->route('publicaciones');
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
