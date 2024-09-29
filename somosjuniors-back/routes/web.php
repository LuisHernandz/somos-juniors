<?php

use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;

// Controladores
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home.index');