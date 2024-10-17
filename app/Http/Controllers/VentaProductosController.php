<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta_Productos;

class VentaProductosController extends Controller
{
    public function vp()
    {
        return view('vp')->with(['vp' => Venta_Productos::all()]);
    }

    public function vp_registrar(Request $request)
    {
        $this->validate($request, [
            'id_venta' => 'required',
            'id_producto' => 'required',
            'fecha' => 'required|date',
        ]);

        $vp = new Venta_Productos();
        $vp->id_venta = $request->input('id_venta');
        $vp->id_producto = $request->input('id_producto');
        $vp->fecha = $request->input('fecha');
        $vp->save();

        return redirect()->route('vp')->with('success', 'Registrado exitosamente');
    }

    public function vp_borrar(Venta_Productos $id)
    {
        $id->delete();
        return redirect()->route('vp');
    }
}
