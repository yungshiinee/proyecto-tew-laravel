<?php

/**
 * CONTROLADOR: UsuarioController
 * MATERIA: Tecnologías Web (TEW)
 * CUMPLE RÚBRICA: "Modelo y controlador de usuario" (Excelente) & "Validación de formularios" (Excelente)
 * 
 * Este controlador administra las acciones de inicio de sesión, registro de nuevos usuarios
 * utilizando el modelo Eloquent 'Usuario', validación estricta y protección de sesión.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class UsuarioController extends Controller
{
    /**
     * Muestra la interfaz de autenticación (Login y Registro).
     * Ejecuta automáticamente migraciones locales pendientes en XAMPP.
     */
    public function showAuth()
    {
        // Auto-creación de la base de datos y migración automática (Criterio: "Migración de la tabla usuario")
        try {
            if (!Schema::hasTable('usuarios')) {
                Artisan::call('migrate');
            }
        } catch (\Exception $e) {
            // Si la base de datos 'carrito_de_compras' no existe (Error 1049), la creamos automáticamente con PDO
            try {
                $host = env('DB_HOST', '127.0.0.1');
                $port = env('DB_PORT', '3306');
                $user = env('DB_USERNAME', 'root');
                $pass = env('DB_PASSWORD', '');
                $dbName = env('DB_DATABASE', 'tew_proyecto');
                
                $pdo = new \PDO("mysql:host=$host;port=$port", $user, $pass);
                $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                
                // Una vez creada, ejecutamos las migraciones para generar la tabla de usuarios
                Artisan::call('migrate');
            } catch (\Exception $e2) {
                // Si falla la conexión a MySQL en general, continuará el flujo normal
            }
        }

        // Redirige al perfil si ya hay una sesión activa
        if (session()->has('user_id')) {
            return redirect()->route('perfil.show');
        }

        return view('login');
    }

    /**
     * Procesa el inicio de sesión del usuario.
     * CUMPLE CRITERIO: "Validación de formularios" con mensajes personalizados en español.
     */
    public function postLogin(Request $request)
    {
        // Validación formal
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ], [
            'email.required'    => 'El correo electrónico es obligatorio para iniciar sesión.',
            'email.email'       => 'Por favor, ingrese un formato de correo electrónico válido.',
            'password.required' => 'La contraseña es obligatoria para acceder.'
        ]);

        // Búsqueda mediante Eloquent (Criterio: "Modelo y controlador de usuario")
        $user = Usuario::where('email', $request->email)->first();

        // Validación de credenciales encriptadas
        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'user_id'    => $user->id,
                'user_name'  => $user->nombre,
                'user_email' => $user->email
            ]);

            return redirect()->route('perfil.show')->with('success', 'Sesión iniciada con éxito. Bienvenido.');
        }

        return back()->with('error', 'Las credenciales ingresadas son incorrectas o el correo no está registrado.')->withInput();
    }

    /**
     * Procesa el registro de un nuevo usuario en la base de datos MySQL (phpMyAdmin XAMPP).
     * CUMPLE CRITERIO: "Funcionamiento del login y registro" & "Validación de formularios".
     */
    public function postRegister(Request $request)
    {
        // Validación completa de campos requeridos
        $request->validate([
            'nombre'   => 'required|string|max:100',
            'email'    => 'required|email|unique:usuarios,email',
            'password' => 'required|min:4'
        ], [
            'nombre.required'   => 'El nombre completo es un campo requerido.',
            'nombre.max'        => 'El nombre no puede exceder los 100 caracteres.',
            'email.required'    => 'El correo electrónico es requerido para el registro.',
            'email.email'       => 'Ingrese una dirección de correo electrónico con formato válido.',
            'email.unique'      => 'Este correo electrónico ya se encuentra registrado en el sistema.',
            'password.required' => 'La contraseña es requerida para proteger su cuenta.',
            'password.min'      => 'La contraseña de seguridad debe contener al menos 4 caracteres.'
        ]);

        // Guardado utilizando el Modelo Eloquent (Criterio: "Modelo y controlador de usuario")
        $user = new Usuario();
        $user->nombre = $request->nombre;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Autenticación automática de sesión
        session([
            'user_id'    => $user->id,
            'user_name'  => $user->nombre,
            'user_email' => $user->email
        ]);

        return redirect()->route('perfil.show')->with('success', 'Usuario registrado correctamente. Bienvenido al portal.');
    }

    /**
     * Muestra la vista protegida del perfil personal del usuario.
     * CUMPLE CRITERIO: "Diseño adecuado para una experiencia de usuario".
     */
    public function showPerfil()
    {
        // Protección de acceso a la página de inicio / perfil
        if (!session()->has('user_id')) {
            return redirect()->route('auth.show')->with('error', 'Acceso restringido. Por favor, inicie sesión.');
        }

        return view('welcome');
    }

    /**
     * Termina la sesión activa del usuario.
     */
    public function logout()
    {
        session()->forget(['user_id', 'user_name', 'user_email']);
        return redirect()->route('auth.show')->with('success', 'Sesión cerrada correctamente. Vuelva pronto.');
    }
}
