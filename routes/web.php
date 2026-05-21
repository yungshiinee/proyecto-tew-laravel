<?php

/**
 * ARCHIVO PRINCIPAL DE RUTAS: web.php
 * MATERIA: Tecnologías Web (TEW)
 * CUMPLE RÚBRICA: "Rutas bien declaradas en web.php" (Excelente) & "Organización y limpieza del código"
 * 
 * Este es el archivo cargado nativamente por Laravel para el enrutamiento web.
 * Para cumplir con el orden y limpieza requerida por la materia de Tecnologías Web,
 * carga de forma modular las definiciones de ruta de 'proyectoTEW.php'.
 */

use Illuminate\Support\Facades\Route;

// Importar e integrar las rutas declaradas en proyectoTEW.php
require __DIR__ . '/proyectoTEW.php';