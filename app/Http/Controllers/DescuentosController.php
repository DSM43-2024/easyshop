<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Descuentos;
class DescuentosController extends Controller
{
    public function carreras(){
        return view('descuentos')
        ->with(['carreras'=> Descuentos::all()]);

    }
    public function carrera_alta()  {
        return view ("carrera_alta");
    }
    public function carrera_registrar(Request $request){
        $this->validate($request,[
            'clave'=> 'required',
            'nombre'=>'required',
            'detalle'=>'required',
            'activo'=>'required'
        ]);
        $carrera = new Carreras();
        $carrera->clave = $request->input('clave');
        $carrera->nombre = $request->input('nombre');
        $carrera->detalle = $request->input('detalle');
        $carrera->activo = $request->input('activo');
        $carrera->save();
    
        return redirect()->route('carreras')->with('success', 'registrado exitosamente');
    }
 public function carrera_detalle($id){
    $query=Carreras::find($id);
    return view("carrera_detalle")
    ->with(['carrera'=>$query]);
 }
    
    
    public function carrera_editar($id){
        $query=Carreras::find($id);
        return view('carrera_editar')
        -> with(['carrera'=> $query ]);
    }
    public function carrera_salvar(Carreras $id, Request $request) {
        $query = Carreras::find($id->id_carrera);
        $query->clave = $request->clave;
        $query->nombre= $request->nombre;    
        $query->detalle = $request->detalle;    
        $query->activo= $request->activo;    
        $query->save();
    
        return redirect()->route("carrera_editar", ['id' => $id->id_carrera]);
    }
    
    public function carrera_borrar(Carreras $id){
        $id->delete();
        return redirect()->route('carreras');
    }
}


