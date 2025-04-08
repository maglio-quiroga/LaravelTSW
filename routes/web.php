<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioControlador;
use App\Http\Controllers\LoginControlador;
use App\Http\Controllers\Actividades;
use App\Http\Controllers\AdminControlador;


Route::get('/', [InicioControlador::class , 'inicio'])->name('inicio');

Route::post('/reserform',[InicioControlador::class , 'enviarPeticion'])->name('reserform');

Route::get('/login', [LoginControlador::class, 'login'])->name('login');

Route::post("/autenticacion",[LoginControlador::class, 'autenticacion'])->name('autenticacion');

Route::get('/logout',[LoginControlador::class,'logout'])->name('logout');

Route::get('/admin',[AdminControlador::class , 'admin'])->middleware('auth')->name('admin');

Route::get('/actividades', [Actividades::class, 'LISTAR_ACTIVIDADES'])->name('actividades.listar');

Route::get('/actividades/crear', [Actividades::class, 'FORMULARIO_CREAR'])->name('actividades.crear');
Route::post('/actividades/guardar', [Actividades::class, 'GUARDAR_ACTIVIDAD'])->name('actividades.guardar');

Route::get('/actividades/{id}/editar', [Actividades::class, 'FORMULARIO_EDITAR'])->name('actividades.editar');
Route::post('/actividades/{id}/actualizar', [Actividades::class, 'ACTUALIZAR_ACTIVIDAD'])->name('actividades.actualizar');

Route::post('/actividades/{id}/eliminar', [Actividades::class, 'ELIMINAR_ACTIVIDAD'])->name('actividades.eliminar');

Route::get('/actividades/{id}', [Actividades::class, 'MOSTRAR_ACTIVIDAD'])->name('actividades.mostrar');
// routes/web.php

use App\Http\Controllers\PreguntaFrecuenteControlador;

Route::get('/preguntas-frecuentes', [PreguntaFrecuenteControlador::class, 'mostrarFaqs']);

