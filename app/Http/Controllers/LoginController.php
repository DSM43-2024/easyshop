<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Mostrar formulario de login
    public function login()
    {
        return view('auth.login');
    }

    // Procesar el login
    public function logina(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirige según el tipo de usuario
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }

            if ($user->isVendedor()) {
                return redirect()->route('vendedor.dashboard');
            }

            // Si no es ni admin ni vendedor, redirige a la página principal
            return redirect()->route('index');
        }

        return back()->withErrors(['email' => 'Credenciales inválidas.']);
    }

    // Función para mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Función para registrar nuevos usuarios
    public function register(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255', // Validar el campo nombre
            'email' => 'required|email|unique:users,email', // Validar el email
            'password' => 'required|min:6|confirmed', // Validación de contraseña
            'tipo' => 'required|string|in:usuario,admin,vendedor', // Validación de tipo
        ]);

        // Crear el nuevo usuario con la contraseña hasheada
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo' => $request->tipo, // Guardar el tipo de usuario
        ]);

        // Redirigir al login después del registro
        return redirect()->route('index');
 
    }
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login.form');
}

}
