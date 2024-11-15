<?php
namespace App\Http\Controllers;

use App\Models\Entradas;
use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Http\Request;

class EntradasController extends Controller
{
    public function entradas()
    {
        // Obtener los productos, proveedores y las entradas
        $productos = Productos::all();
        $proveedores = Proveedores::all();
        $entradas = Entradas::with(['producto', 'proveedor'])->get(); // Cargar las relaciones

        // Pasar los datos a la vista
        return view('entradas', compact('productos', 'proveedores', 'entradas'));
    }

    public function entrada_registrar(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'id_producto' => 'required',
            'id_proveedor' => 'required',
            'created_at' => 'required|date',
        ]);

        // Crear un nuevo registro de Entrada
        Entradas::create([
            'id_producto' => $request->input('id_producto'),
            'id_proveedor' => $request->input('id_proveedor'),
            'created_at' => $request->input('created_at'),
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('entradas')->with('success', 'Entrada registrada exitosamente.');
    }
    
    public function entrada_borrar(Entradas $id){
        $id->delete();
        return redirect()->route('entradas');
    }
}
