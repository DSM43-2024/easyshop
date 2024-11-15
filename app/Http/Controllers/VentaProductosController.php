<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use App\Models\Productos;
use App\Models\Venta_Productos;
use Illuminate\Http\Request;

class VentaProductosController extends Controller
{
    public function vp()
    {
        // Obtener todas las ventas con sus productos asociados
        $ventas = Ventas::with('ventaProductos')->get();
        
        // Obtener todos los productos disponibles
        $productos = Productos::all();

        // Obtener todos los registros de la tabla intermedia VentaProducto
        $vp = Venta_Productos::with(['venta', 'producto'])->get(); // Cargar relaciones

        return view('vp')->with([
            'ventas' => $ventas,
            'productos' => $productos,
            'vp' => $vp,
        ]);
    }

    public function vp_registrar(Request $request)
    {
        $request->validate([
            'id_venta' => 'required|exists:ventas,id_venta',
            'id_producto' => 'required|exists:productos,id_producto',
            'fecha' => 'required|date',
        ]);

        // Crear un nuevo registro en la tabla VentaProducto
        $vp = new Venta_Productos();
        $vp->id_venta = $request->input('id_venta');
        $vp->id_producto = $request->input('id_producto');
        $vp->fecha = $request->input('fecha');
        $vp->save();

        return redirect()->route('vp')->with('success', 'Registrado exitosamente');
    }

    public function vp_borrar(Venta_Productos $id)
    {
        // Eliminar el registro de VentaProducto
        $id->delete();
        return redirect()->route('vp')->with('success', 'Eliminado exitosamente');
    }
}
