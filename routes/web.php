<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioControlador;
use App\Http\Controllers\LoginControlador;
use App\Http\Controllers\AdminControlador;

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
