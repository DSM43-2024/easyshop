<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Productos;

class ProductosController extends Controller
{
    public function productos(){
        return view('productos')
        ->with(['productos'=> Productos::all()]);
    }

    public function productos_alta() {
        return view("productos_alta");
    }

    public function productos_registrar(Request $request){
        $this->validate($request, [
            'id_categoria' => 'required',
            'stock' => 'required',
            'precio'=>'required',
            'id_descuento'=>'required',
            'id_ubicacion'=>'required',
            'activo'=>'required',
            'caducidad'=>'required',
            'nombre'=>'required'
        ]);

        $producto = new Productos();
        $producto->tipo = $request->input('tipo');
        $producto->activo = $request->input('activo');
        $producto->save();

        return redirect()->route('productos')->with('success', 'Producto registrado exitosamente');
    }

    public function productos_detalle($id){
        $query = Productos::find($id);
        return view("productos_detalle")
        ->with(['producto' => $query]);
    }

    public function productos_editar($id){
        $query = Productos::find($id);
        return view('productos_editar')
        ->with(['producto' => $query]);
    }

    public function productos_salvar(Productos $id, Request $request) {
        $query = Productos::find($id->id_producto);
        $query->tipo = $request->tipo; 
        $query->activo = $request->activo;    
        $query->save();

        return redirect()->route("productos_editar", ['id' => $id->id_producto]);
    }

    public function productos_borrar(Productos $id){
        $id->delete();
        return redirect()->route('productos');
    }
}
