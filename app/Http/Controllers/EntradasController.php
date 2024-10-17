<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Entradas;

class EntradasController extends Controller
{
    public function descuentos(){
        return view('descuentos')
        ->with(['descuentos'=> Entradas::all()]);
    }

    public function descuento_alta()  {
        return view("descuento_alta");
    }

    public function descuento_registrar(Request $request){
        $this->validate($request, [
            'clave' => 'required',
            'nombre' => 'required',
            'detalle' => 'required',
            'activo' => 'required'
        ]);

        $entrada = new Entradas();
        $entrada->id_producto = $request->input('id_producto');
        $descuento->nombre = $request->input('nombre');
        $descuento->detalle = $request->input('detalle');
        $descuento->activo = $request->input('activo');
        $descuento->save();

        return redirect()->route('descuentos')->with('success', 'Registrado exitosamente');
    }

    public function descuento_detalle($id){
        $query = Entradas::find($id);
        return view("descuento_detalle")
        ->with(['descuento' => $query]);
    }

    public function descuento_editar($id){
        $query = Entradas::find($id);
        return view('descuento_editar')
        ->with(['entrada' => $query]);
    }

    public function descuento_salvar(Entradas $id, Request $request) {
        $query = Entradas::find($id->id_entrada);
        $query->clave = $request->clave;
        $query->nombre = $request->nombre;    
        $query->detalle = $request->detalle;    
        $query->activo = $request->activo;    
        $query->save();

        return redirect()->route("entrada_editar", ['id' => $id->id_entrada]);
    }

    public function entrada_borrar(Entradas $id){
        $id->delete();
        return redirect()->route('entradas');
    }
}
