<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioControlador;
use App\Http\Controllers\LoginControlador;

Route::get('/', [InicioControlador::class , 'inicio']);

Route::get('/login', [LoginControlador::class, 'login'])->name('login');
