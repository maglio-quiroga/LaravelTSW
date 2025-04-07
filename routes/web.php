<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioControlador;
use App\Http\Controllers\LoginControlador;
use App\Http\Controllers\AdminControlador;
use App\Http\Controllers\ActividadesControlador;

Route::get('/', [InicioControlador::class , 'inicio'])->name('inicio'); //

Route::post('/reserform',[InicioControlador::class , 'enviarPeticion'])->name('reserform'); //

Route::get('/login', [LoginControlador::class, 'login'])->name('login'); //

Route::post("/autenticacion",[LoginControlador::class, 'autenticacion'])->name('autenticacion'); //

Route::get('/logout',[LoginControlador::class,'logout'])->name('logout'); //

Route::get('/admin',[AdminControlador::class , 'admin'])->middleware('auth')->name('admin'); //

Route::get('/publicaciones', [AdminControlador::class , 'publicaciones'])->middleware('auth')->name('publicaciones'); //

Route::post('/crearpublicacion', [AdminControlador::class , 'crearPublicacion'])->middleware('auth')->name('crearpublicacion');//

Route::get('/modificarpublicacion/{id}', [AdminControlador::class , 'modificarPublicacion'])->middleware('auth')->name('modificarpublicacion');

Route::post('/actualizarpublicacion', [AdminControlador::class , 'actualizarPublicacion'])->middleware('auth')->name('actpublicacion');

Route::post('/eliminarpublicacion', [AdminControlador::class , 'eliminarPublicacion'])->middleware('auth')->name('delpublicacion');

Route::get('/noticias', function() {echo "noticasss";})->middleware('auth')->name('noticias');

Route::get('/actividades', [ActividadesControlador::class, 'LISTAR_ACTIVIDADES'])->middleware('auth')->name('actividades.listar');

Route::get('/actividades/crear', [ActividadesControlador::class, 'FORMULARIO_CREAR'])->middleware('auth')->name('actividades.formcrear');

Route::post('/actividades/guardar', [ActividadesControlador::class, 'GUARDAR_ACTIVIDAD'])->middleware('auth')->name('actividades.guardar');

Route::get('/actividades/editar/{id}', [ActividadesControlador::class, 'FORMULARIO_EDITAR'])->middleware('auth')->name('actividades.formeditar');

Route::post('/actividades/actualizar/{id}', [ActividadesControlador::class, 'ACTUALIZAR_ACTIVIDAD'])->middleware('auth')->name('actividades.actualizar');

Route::post('/actividades/eliminar/{id}', [ActividadesControlador::class, 'ELIMINAR_ACTIVIDAD'])->middleware('auth')->name('actividades.eliminar');