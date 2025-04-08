<?php
// app/Http/Controllers/PreguntaFrecuenteControlador.php

namespace App\Http\Controllers;

use App\Models\PreguntaFrecuente;
use Illuminate\Http\Request;

class PreguntaFrecuenteControlador extends Controller
{
    public function mostrarFaqs()
    {
        // Obtener todos los registros de la base de datos
        $faqs = PreguntaFrecuente::all();

        // Depuración: Verifica que los datos se estén recuperando correctamente
        if ($faqs->isEmpty()) {
            return response()->json(['message' => 'No FAQs found']);
        }

        // Pasar los datos a la vista
        return view('inicio.index', compact('faqs'));
    }
}

