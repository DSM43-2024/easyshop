<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Personal;
use Illuminate\Support\Facades\Session;

class VentasController extends Controller
{
    public function ventas()
    {
        // Obtener todas las ventas con sus relaciones y todos los personales
        $ventas = Ventas::with('personal')->get();
        $personales = Personal::all();

        return view('ventas', compact('ventas', 'personales'));
    }

    public function venta_registrar(Request $request)
    {
        // Validación de datos
        $request->validate([
            'id_personal' => 'required|exists:personal,id_personal', // Verificar si el ID de personal existe
            'nombre' => 'required', // Validar que 'nombre' no esté vacío
            'tipo_venta' => 'required', // Validar que el tipo de venta se seleccione
        ]);

        // Crear una nueva venta
        Ventas::create([
            'id_personal' => $request->id_personal,
            'nombre' => $request->nombre, // Aquí se espera que 'nombre' sea el tipo de venta
            'tipo_venta' => $request->tipo_venta, // Asegúrate de incluir el campo 'tipo_venta' si lo necesitas
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('ventas')->with('success', 'Venta registrada correctamente.');
    }

    public function venta_borrar($id_venta)
    {
        // Eliminar la venta seleccionada
        $venta = Ventas::findOrFail($id_venta); // Encuentra la venta por ID, si no existe lanzará un error 404
        $venta->delete();
        
        // Redirigir con un mensaje de éxito
        return redirect()->route('ventas')->with('success', 'Venta eliminada correctamente.');
    }
}
