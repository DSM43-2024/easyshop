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
    public function exportarCSV()
    {
        // Nombre del archivo
        $fileName = "categorias.csv";
    
        // Configuración de encabezados para la descarga
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
    
        // Abrir un flujo de salida
        $output = fopen('php://output', 'w');
    
        // Escribir los encabezados de las columnas
        fputcsv($output, ['ID', 'Nombre', 'Tipo', 'Fecha de Creación', 'Última Actualización']);
    
        // Obtener los datos de la base de datos
        $categorias = Categorias::all();
    
        // Escribir cada fila de datos
        foreach ($categorias as $categoria) {
            fputcsv($output, [
                $categoria->id_categoria, 
                $categoria->nombre, 
                $categoria->tipo, 
                $categoria->created_at, 
                $categoria->updated_at
            ]);
        }
    
        // Cerrar el flujo de salida
        fclose($output);
        exit();
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
