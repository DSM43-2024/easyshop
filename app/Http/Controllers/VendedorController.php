<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendedorController extends Controller
{
    // Constructor para aplicar middleware de vendedor
    public function __construct()
    {
        $this->middleware('is_vendedor');
    }

    public function dashboard()
    {
        // Página de ventas o dashboard del vendedor
        return view('vendedor.dashboard'); // Esta es la vista para el dashboard del vendedor
    }

    // Métodos adicionales para el CRUD de ventas, etc.
}
