<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Muestra el formulario de registro.
     *
     * @return \Illuminate\View\View
     */
    public function showRegisterForm()
    {
        return view('auth.register'); // Cambia la vista si es necesario
    }

    /**
     * Procesa los datos del formulario de registro.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'tipo' => 'usuario', // Por defecto, tipo 'usuario'
        ]);

        // Autenticar al usuario después de registrarlo
        Auth::login($user);

        return redirect()->route('dashboard'); // Redirige al dashboard o a la página que desees
    }

    /**
     * Muestra el formulario de inicio de sesión.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Cambia la vista si es necesario
    }

    /**
     * Procesa el inicio de sesión del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validación de los datos de inicio de sesión
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($validated)) {
            // Si la autenticación es exitosa, redirige al dashboard
            return redirect()->route('dashboard');
        }

        // Si falla la autenticación, redirige de nuevo al formulario de inicio de sesión con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout(); // Cierra la sesión
        return redirect()->route('login'); // Redirige a la página de inicio de sesión
    }

    /**
     * Muestra el perfil del usuario autenticado.
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        return view('user.profile', ['user' => Auth::user()]);
    }

    /**
     * Actualiza el tipo de usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUserType(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Valida que el tipo sea uno de los valores posibles
        $validated = $request->validate([
            'tipo' => 'required|in:administrador,usuario',
        ]);

        // Actualiza el tipo de usuario
        $user->update(['tipo' => $validated['tipo']]);

        return redirect()->route('users.index')->with('success', 'Tipo de usuario actualizado con éxito');
    }
}
