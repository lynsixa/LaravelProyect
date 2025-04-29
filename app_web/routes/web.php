<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RecuperarController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\NISController;  // Asegúrate de importar el controlador NIS

// Rutas de inicio, registro y login
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/registro', [RegistroController::class, 'showForm'])->name('registro.form');
Route::post('/registro', [RegistroController::class, 'registrar'])->name('registro.enviar');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas para recuperar contraseña
Route::get('/recuperar', [RecuperarController::class, 'showForm'])->name('recuperar.form');
Route::post('/recuperar', [RecuperarController::class, 'enviarCorreo'])->name('recuperar.enviar');
Route::get('/recuperar/cambiar/{id}/{token}', [RecuperarController::class, 'cambiarForm'])->name('recuperar.cambiar.form');
Route::post('/recuperar/cambiar', [RecuperarController::class, 'cambiarPassword'])->name('recuperar.cambiar.enviar');

// DASHBOARD POR ROLES
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');

// RUTAS DE EVENTOS Y CALENDARIO
Route::prefix('admin')->name('admin.')->group(function () {
    // Rutas para la gestión de eventos
    Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
    Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');
    Route::get('/eventos/{evento}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
    Route::put('/eventos/{evento}', [EventoController::class, 'update'])->name('eventos.update');
    Route::delete('/eventos/{evento}', [EventoController::class, 'destroy'])->name('eventos.destroy');

    // Ruta para el calendario
    Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario.index');
    Route::get('/calendario/eventos', [CalendarioController::class, 'eventos'])->name('calendario.eventos');

    // Rutas para la gestión de NIS
    Route::get('/nis', [NISController::class, 'index'])->name('nis.index');
    Route::get('/nis/create', [NISController::class, 'create'])->name('nis.create');
    Route::post('/nis', [NISController::class, 'store'])->name('nis.store');
    Route::get('/nis/{nis}/edit', [NISController::class, 'edit'])->name('nis.edit');
    Route::put('/nis/{nis}', [NISController::class, 'update'])->name('nis.update');
    Route::delete('/nis/{nis}', [NISController::class, 'destroy'])->name('nis.destroy');
});
