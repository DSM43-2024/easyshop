<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Entradas;

class EntradasController extends Controller
{
    public function entradas(){
        return view('entradas')
        ->with(['entradas'=> Entradas::all()]);
    }

    public function entrada_alta()  {
        return view("entrada_alta");
    }

    public function entrada_registrar(Request $request){
        $this->validate($request, [
            'id_proveedor' => 'required',
            'id_producto' => 'required'
        ]);

        $entrada = new Entradas();
        $entrada->id_entrada = $request->input('id_producto');
        $entrada->id_producto = $request->input('nombre');
        $entrada->id_proveedor = $request->input('detalle');
        $entrada->save();

        return redirect()->route('descuentos')->with('success', 'Registrado exitosamente');
    }

    public function entrada_detalle($id){
        $query = Entradas::find($id);
        return view("entrada_detalle")
        ->with(['entrada' => $query]);
    }

    public function entrada_editar($id){
        $query = Entradas::find($id);
        return view('entrada_editar')
        ->with(['entrada' => $query]);
    }

    public function entrada_salvar(Entradas $id, Request $request) {
        $query = Entradas::find($id->id_entrada);
        $query->id_producto = $request->clave;
        $query->id_proveedor = $request->nombre;    
        $query->save();

        return redirect()->route("entrada_editar", ['id' => $id->id_entrada]);
    }

    public function entrada_borrar(Entradas $id){
        $id->delete();
        return redirect()->route('entradas');
    }
}
