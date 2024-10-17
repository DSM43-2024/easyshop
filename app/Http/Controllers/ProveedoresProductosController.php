<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedores_Productos;

class ProveedoresProductosController extends Controller
{
    public function pp()
    {
        return view('pp')->with(['pp' => Proveedores_Productos::all()]);
    }

    public function pp_registrar(Request $request)
    {
        $this->validate($request, [
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
        return redirect()->route('pp');
    }
}
