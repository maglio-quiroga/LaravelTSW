<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioControlador;
use App\Http\Controllers\LoginControlador;
use App\Http\Controllers\Actividades;

Route::get('/', [InicioControlador::class , 'inicio'])->name('inicio');

Route::get('/login', [LoginControlador::class, 'login'])->name('login');

Route::post("/autenticacion",[LoginControlador::class, 'autenticacion'])->name('autenticacion');

Route::get('/logout',[LoginControlador::class,'logout'])->name('logout');

Route::get('/admin',function (){echo "AcA estara el admin";})->middleware('auth')->name('admin');


Route::prefix('admin')->name('admin.actividades.')->group(function () {
    Route::get('actividades', [Actividades::class, 'LISTAR_ACTIVIDADES'])->name('listar');
    Route::get('actividades/crear', [Actividades::class, 'FORMULARIO_CREAR'])->name('crear');
    Route::post('actividades', [Actividades::class, 'GUARDAR_ACTIVIDAD'])->name('guardar');
    Route::get('actividades/{id}/editar', [Actividades::class, 'FORMULARIO_EDITAR'])->name('editar');
    Route::put('actividades/{id}', [Actividades::class, 'ACTUALIZAR_ACTIVIDAD'])->name('actualizar');
    Route::delete('actividades/{id}', [Actividades::class, 'ELIMINAR_ACTIVIDAD'])->name('eliminar');
    Route::get('actividades/{id}', [Actividades::class, 'MOSTRAR_ACTIVIDAD'])->name('mostrar');
});