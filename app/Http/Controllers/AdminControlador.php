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

