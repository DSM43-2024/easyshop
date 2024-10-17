<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Entrada_Productos;

class EntradaProductosController extends Controller
{
    public function ep(){
        return view('ep')
        ->with(['ep'=> Entrada_Productos::all()]);
    }

    public function ep_registrar(Request $request){
        $this->validate($request, [
            'id_entrada' => 'required',
            'id_producto' => 'required',
        ]);

        $ep = new Entrada_Productos();
        $ep->id_entrada = $request->input('id_entrada');
        $ep->id_producto = $request->input('id_producto');
        $ep->save();

        return redirect()->route('ep')->with('success', 'Registrado exitosamente');
    }

    public function ep_borrar(Entrada_Productos $id){
        $id->delete();
        return redirect()->route('ep');
    }
}
