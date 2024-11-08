<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Descuentos;

class DescuentosController extends Controller
{
    public function descuentos(){
        return view('descuentos')
        ->with(['descuentos'=> Descuentos::all()]);
    }

    public function descuento_alta()  {
        return view("descuento_alta");
    }

    public function descuento_registrar(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'cantidad' => 'required',
            'activo' => 'required'
        ]);

        $descuento = new Descuentos();
        $descuento->nombre = $request->input('nombre');
        $descuento->cantidad = $request->input('cantidad');
        $descuento->activo = $request->input('activo');
        $descuento->save();

        return redirect()->route('descuentos')->with('success', 'Registrado exitosamente');
    }

    public function descuento_detalle($id){
        $query = Descuentos::find($id);
        return view("descuento_detalle")
        ->with(['descuento' => $query]);
    }

    public function descuento_editar($id){
        $query = Descuentos::find($id);
        return view('descuento_editar')
        ->with(['descuento' => $query]);
    }

    public function descuento_salvar(Descuentos $id, Request $request) {
        $query = Descuentos::find($id->id_descuento);
        $query->nombre = $request->nombre;    
        $query->activo = $request->activo;    
        $query->save();

        return redirect()->route("descuento_editar", ['id' => $id->id_descuento]);
    }

    public function descuento_borrar(Descuentos $id){
        $id->delete();
        return redirect()->route('descuentos');
    }
}
