<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\BloqueController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReporteController;
use Inertia\Inertia;

// Página de login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/formulario', [FormularioController::class, 'index'])->name('formulario');
    Route::post('/formulario', [FormularioController::class, 'store'])->name('formulario.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('piezas',PiezaController::class);
    Route::resource('bloques',BloqueController::class);
    Route::resource('proyectos',ProyectoController::class);
    Route::resource('usuarios',UserController::class);
    Route::get('/reportes/pendientes', [ReporteController::class, 'piezasPendientes'])->name('reportes.pendientes');
    Route::get('/reportes/graficos', [ReporteController::class, 'graficoPiezas'])->name('reportes.grafico');
});
