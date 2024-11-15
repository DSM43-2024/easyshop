<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use App\Models\Proveedores_Productos;

class ProveedoresProductosController extends Controller
{
    public function pp()
    {
        $proveedores = Proveedores::with('productos')->get();
        $productos = Productos::all();
        $pp = Proveedores_Productos::with(['proveedor', 'producto'])->get(); // Cargar relaciones
    
        return view('pp')->with([
            'proveedores' => $proveedores,
            'productos' => $productos,
            'pp' => $pp,
        ]);
    }
    

    public function pp_registrar(Request $request)
    {
        $request->validate([
            'id_proveedor' => 'required',
            'id_producto' => 'required',
        ]);

        $pp = new Proveedores_Productos();
        $pp->id_proveedor = $request->input('id_proveedor');
        $pp->id_producto = $request->input('id_producto');
        $pp->save();

        return redirect()->route('pp')->with('success', 'Registrado exitosamente');
    }

    public function pp_borrar(Proveedores_Productos $id)
    {
        $id->delete();
        return redirect()->route('pp')->with('success', 'Eliminado exitosamente');
    }
}
