<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    public function categorias(){
        return view('categorias')
        ->with(['categorias' => Categorias::paginate(10)]); // paginate 10 items per page
    }

    public function categoria_alta()  {
        return view("categoria_alta");
    }

    public function categoria_registrar(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'tipo' => 'required',
        ]);

        $categoria = new Categorias();
        $categoria->nombre = $request->input('nombre');
        $categoria->tipo = $request->input('tipo');
        $categoria->save();

        return redirect()->route('categorias')->with('success', 'Registrado exitosamente');
    }

    public function categoria_detalle($id){
        $query = Categorias::find($id);
        return view("categoria_detalle")
        ->with(['categoria' => $query]);
    }

    public function categoria_editar($id){
        $query = Categorias::find($id);
        return view('categoria_editar')
        ->with(['categoria' => $query]);
    }

    public function categoria_salvar(Categorias $id, Request $request) {
        $query = Categorias::find($id->id_categoria);
        $query->nombre = $request->nombre;    
        $query->tipo = $request->tipo;    
        $query->save();

        return redirect()->route("categoria_editar", ['id' => $id->id_categoria]);
    }

    public function categoria_borrar(Categorias $id){
        $id->delete();
        return redirect()->route('categorias');
    }
}
