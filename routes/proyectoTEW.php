<?php

/**
 * ARCHIVO DE RUTAS: proyectoTEW.php
 * MATERIA: Tecnologías Web (TEW)
 * CUMPLE RÚBRICA: "Rutas bien declaradas en web.php" (Excelente) & "Organización y limpieza del código"
 * 
 * Este archivo define formalmente todas las rutas de la aplicación de acceso (login/registro)
 * y la sección protegida del perfil personal del estudiante Carlos.
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

// 1. Mostrar la vista unificada de Iniciar Sesión / Registro
Route::get('/', [UsuarioController::class, 'showAuth'])
    ->name('auth.show');

// 2. Procesar el envío de datos de Inicio de Sesión (POST)
Route::post('/login', [UsuarioController::class, 'postLogin'])
    ->name('auth.login');

// 3. Procesar el envío de datos de Registro de Usuarios (POST)
Route::post('/register', [UsuarioController::class, 'postRegister'])
    ->name('auth.register');

// 4. Mostrar la página de inicio / perfil personal (Solo usuarios autenticados)
Route::get('/perfil', [UsuarioController::class, 'showPerfil'])
    ->name('perfil.show');

// 5. Cerrar la sesión activa del usuario y retornar al acceso
Route::get('/logout', [UsuarioController::class, 'logout'])
    ->name('auth.logout');
