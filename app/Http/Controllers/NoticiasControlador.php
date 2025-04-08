<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiasControlador extends Controller
{
    public function noticias(){
        $noticias = Noticia::all();
        return view('admin.noticias', compact('noticias'));
    }

    public function modificarNoticia(int $id){
        $noticia = Noticia::findOrFail($id);
        return view('admin.modificar-noticia', compact('noticia'));
    }

    public function crearNoticia(Request $request){
        $validatedData = $request->validate([
            'titulo'      => 'required|string|max:255',
            'imagen'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'descripcion' => 'required|string',
        ]);

        if ($request->hasFile('imagen')) {
            $imageName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('img'), $imageName);
            $validatedData['imagen'] = 'img/' . $imageName;
        }

        Noticia::create($validatedData);
        return redirect()->back()->with('success', 'Noticia creada exitosamente.');
    }

    public function eliminarNoticia(Request $request){
        $id = $request->post('id_noticia');
        Noticia::destroy($id);

        return redirect()->route('noticias');
    }

    public function actualizarNoticia(Request $request){
        $validatedData = $request->validate([
            'id_noticia'   => 'required|exists:noticias,id',
            'titulo'       => 'required|string|max:255',
            'imagen'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'descripcion'  => 'required|string',
        ]);

        $noticia = Noticia::findOrFail($validatedData['id_noticia']);

        if ($request->hasFile('imagen')) {
            $imageName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('img'), $imageName);
            $validatedData['imagen'] = 'img/' . $imageName;
        } else {
            unset($validatedData['imagen']);
        }

        $noticia->update($validatedData);
        return redirect()->route('noticias');
    }
}
