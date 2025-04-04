<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioControlador;

Route::get('/', [InicioControlador::class , 'inicio']);
