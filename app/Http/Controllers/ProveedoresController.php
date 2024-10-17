<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Proveedores; 

class ProveedoresController extends Controller
{
    public function index(){
        return view('proveedores')->with(['proveedores' => Proveedores::all()]);
    }

    public function crear() {
        return view("proveedores_crear");
    }

    public function registrar(Request $request){
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

    public function detalle($id){
        $proveedor = Proveedores::find($id);
        return view("proveedores_detalle")->with(['proveedor' => $proveedor]);
    }

    public function editar($id){
        $proveedor = Proveedores::find($id);
        return view('proveedores_editar')->with(['proveedor' => $proveedor]);
    }

    public function salvar(Request $request, $id) {
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

    public function borrar($id){
        $proveedor = Proveedores::find($id);
        $proveedor->delete();
        return redirect()->route('proveedores')->with('success', 'Proveedor eliminado exitosamente');
    }
}
