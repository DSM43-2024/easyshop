<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTipo
{
    public function handle(Request $request, Closure $next, $tipo)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Comprobamos si el tipo de usuario coincide con el tipo requerido
            if (($tipo == 'admin' && !$user->isAdmin()) || ($tipo == 'vendedor' && !$user->isVendedor())) {
                // Redirigir si el usuario no tiene el tipo adecuado
                return redirect('/');
            }
        }

        return $next($request);
    }
}
