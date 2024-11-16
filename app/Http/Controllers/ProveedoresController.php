<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Proveedores; 

class ProveedoresController extends Controller
{
    public function proveedores(){
        return view('proveedores')
        ->with(['proveedores' => Proveedores::paginate(10)]); // paginate 10 items per page

    }



    public function proveedor_registrar(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
        ]);

        $proveedor = new Proveedores();
        $proveedor->nombre = $request->input('nombre');
        $proveedor->email = $request->input('email');
        $proveedor->save();

        return redirect()->route('proveedores')->with('success', 'Proveedor registrado exitosamente');
    }

    public function proveedor_detalle($id){
        $proveedor = Proveedores::find($id);
        return view("proveedores_detalle")->with(['proveedor' => $proveedor]);
    }

    public function proveedor_editar($id){
        $proveedor = Proveedores::find($id);
        return view('proveedores_editar')->with(['proveedor' => $proveedor]);
    }
    public function proveedor_alta()  {
        return view("proveedor_alta");
    }
    public function proveedor_salvar(Request $request, $id) {
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
        ]);

        $proveedor = Proveedores::find($id);
        $proveedor->nombre = $request->input('nombre'); 
        $proveedor->email = $request->input('email');    
        $proveedor->save();

        return redirect()->route("proveedores_editar", ['id' => $id])->with('success', 'Proveedor actualizado exitosamente');
    }

    public function proveedor_borrar($id){
        $proveedor = Proveedores::find($id);
        $proveedor->delete();
        return redirect()->route('proveedores')->with('success', 'Proveedor eliminado exitosamente');
    }
}
