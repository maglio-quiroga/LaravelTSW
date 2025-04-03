<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicioControlador;

Route::get('/', [inicioControlador::class , 'inicio']);
