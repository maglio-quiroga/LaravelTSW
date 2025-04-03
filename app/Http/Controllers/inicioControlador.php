<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inicioControlador extends Controller
{
    //
    public function inicio(){
        return view('inicio.inicio');
    }
}
