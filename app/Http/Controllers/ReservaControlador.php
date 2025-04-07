<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaControlador extends Controller
{
    public function getReservas()
    {
        $reservas = Reserva::all(); // Obtener todas las reservas
        return response()->json($reservas); // Devolver como JSON
    }
}