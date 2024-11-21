<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTipo
{
    public function handle(Request $request, Closure $next, $tipo)
    {
        // Check if user is of the correct type (vendedor, admin, etc.)
        if ($request->user()->tipo !== $tipo) {
            // Redirect or handle error
            return redirect()->back();
        }

        return $next($request);
    }
}
