<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RecuperarController;

// Ruta para el inicio
Route::get('/', [HomeController::class, 'index'])->name('home');

// Registro de usuarios
Route::get('/registro', [RegistroController::class, 'showForm'])->name('registro.form');
Route::post('/registro', [RegistroController::class, 'registrar'])->name('registro.enviar');

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Si vas a manejar la lógica de login desde Laravel (en lugar de usar el controlador predeterminado):
// Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Recuperar contraseña
Route::get('/recuperar', [RecuperarController::class, 'showForm'])->name('recuperar.form');
Route::post('/recuperar', [RecuperarController::class, 'enviarCorreo'])->name('recuperar.enviar');

// Ruta para cambiar la contraseña (requiere id y token)
Route::get('/recuperar/cambiar/{id}/{token}', [RecuperarController::class, 'cambiarForm'])->name('recuperar.cambiar.form');
Route::post('/recuperar/cambiar', [RecuperarController::class, 'cambiarPassword'])->name('recuperar.cambiar.enviar');
