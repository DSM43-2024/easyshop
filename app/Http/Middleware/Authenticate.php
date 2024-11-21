<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Verifica si el usuario está autenticado
        if (!$request->expectsJson()) {
            if (auth()->check()) {
                // Redirige al dashboard correspondiente según el tipo
                $user = auth()->user();
                return match ($user->tipo) {
                    'admin' => route('admin.dashboard'),
                    'vendedor' => route('vendedor.dashboard'),
                    default => route('login'),
                };
            }
            return route('login');
        }
    
        return null;
    }
    
}
