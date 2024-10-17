<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;

class VentasController extends Controller
{
    public function ventas()
    {
        return view('ventas')->with(['ventas' => Ventas::all()]);
    }

    public function venta_alta()
    {
        return view('venta_alta'); 
    }

    public function venta_registrar(Request $request)
    {
        $this->validate($request, [
            'id_personal' => 'required',
        ]);

        $venta = new Ventas();
        $venta->id_personal = $request->input('id_personal');
        $venta->save();

        return redirect()->route('ventas')->with('success', 'Venta registrada exitosamente');
    }

    public function venta_detalle($id)
    {
        $venta = Ventas::find($id);
        return view('venta_detalle')->with(['venta' => $venta]);
    }

    public function venta_editar($id)
    {
        $venta = Ventas::find($id);
        return view('venta_editar')->with(['venta' => $venta]);
    }

    public function venta_salvar(Request $request, $id)
    {
        $this->validate($request, [
            'id_personal' => 'required',
        ]);

        $venta = Ventas::find($id);
        $venta->id_personal = $request->input('id_personal');
        $venta->save();

        return redirect()->route('venta_editar', ['id' => $id])->with('success', 'Venta actualizada exitosamente');
    }

    public function venta_borrar($id)
    {
        $venta = Ventas::find($id);
        $venta->delete();
        return redirect()->route('ventas')->with('success', 'Venta eliminada exitosamente');
    }
}
