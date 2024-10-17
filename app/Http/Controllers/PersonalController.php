<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Personal;

class PersonalController extends Controller
{
    public function personal(){
        return view('personal')
        ->with(['personal'=> Personal::all()]);
    }

    public function personal_alta()  {
        return view("personal_alta");
    }

    public function personal_registrar(Request $request){
        $this->validate($request, [
            'tipo' => 'required',
            'activo' => 'required'
        ]);

        $personal = new Personal();
        $personal->tipo = $request->input('tipo');
        $personal->activo = $request->input('activo');
        $personal->save();

        return redirect()->route('personal')->with('success', 'Registrado exitosamente');
    }

    public function personal_detalle($id){
        $query = Personal::find($id);
        return view("personal_detalle")
        ->with(['personal' => $query]);
    }

    public function personal_editar($id){
        $query = Personal::find($id);
        return view('personal_editar')
        ->with(['personal' => $query]);
    }

    public function personal_salvar(Personal $id, Request $request) {
        $query = Personal::find($id->id_personal);
        $query->tipo = $request->tipo; 
        $query->activo = $request->activo;    
        $query->save();

        return redirect()->route("personal_editar", ['id' => $id->id_personal]);
    }

    public function personal_borrar(Personal $id){
        $id->delete();
        return redirect()->route('personal');
    }
}
