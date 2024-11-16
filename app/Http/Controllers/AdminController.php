<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Constructor para aplicar middleware de administrador
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function dashboard()
    {
        // Página de administración
        return view('admin.dashboard'); // Esta es la vista para el dashboard del administrador
    }

    // Métodos adicionales para el CRUD de usuarios, productos, etc.
}
