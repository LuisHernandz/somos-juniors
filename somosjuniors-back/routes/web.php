<?php

use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;

// Controladores
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::controller(CursoController::class)->group(function () {
    Route::get('/cursos', 'index')->name('cursos.index');
    Route::get('/cursos/crear', 'create')->name('cursos.create');
    Route::post('/cursos/crear', 'store')->name('cursos.store');
    Route::get('/cursos/{id}', 'show')->name('cursos.show');
    Route::get('/cursos/editar/{curso}', 'edit')->name('cursos.edit');
    Route::put('/cursos/editar/{curso}', 'update')->name('cursos.update');
    
    Route::delete('/cursos/eliminar/{curso}', 'destroy')->name('cursos.destroy');
    
});