<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioControlador;
use App\Http\Controllers\LoginControlador;

Route::get('/', [InicioControlador::class , 'inicio'])->name('inicio');

Route::get('/login', [LoginControlador::class, 'login'])->name('login');

Route::post("/autenticacion",[LoginControlador::class, 'autenticacion'])->name('autenticacion');

Route::get('/logout',[LoginControlador::class,'logout'])->name('logout');

Route::get('/admin',function (){echo "AcA estara el admin";})->middleware('auth')->name('admin');
