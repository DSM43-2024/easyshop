<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Personal;

class PersonalController extends Controller
{
    public function personal(){
        return view('personal')
        ->with(['personal' => Personal::paginate(10)]); // paginate 10 items per page
    }

    public function personal_alta()  {
        return view("personal_alta");
    }

    public function personal_registrar(Request $request){
        $this->validate($request, [
            'tipo' => 'required',
            'activo' => 'required',
            'nombre'=>'required'
        ]);

        $personal = new Personal();
        $personal->tipo = $request->input('tipo');
        $personal->activo = $request->input('activo');
        $personal->nombre = $request->input('nombre');
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
    public function exportarCSV()
    {
        $fileName = "personal.csv";

        // Configurar encabezados para la descarga
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        $output = fopen('php://output', 'w');

        // Escribir los encabezados de las columnas
        fputcsv($output, ['ID', 'Nombre', 'Tipo', 'Activo', 'Fecha de Creación', 'Última Actualización']);

        // Obtener los datos de la base de datos
        $personal = Personal::all();

        // Escribir cada fila de datos
        foreach ($personal as $persona) {
            fputcsv($output, [
                $persona->id_personal,
                $persona->nombre,
                $persona->tipo,
                $persona->activo,
                $persona->created_at,
                $persona->updated_at,
            ]);
        }

        fclose($output);
        exit();
    }
    public function personal_salvar(Personal $id, Request $request) {
        $query = Personal::find($id->id_personal);
        $query->tipo = $request->tipo; 
        $query->activo = $request->activo;    
        $query->nombre = $request->nombre;    
        $query->save();

        return redirect()->route("personal_editar", ['id' => $id->id_personal]);
    }

    public function personal_borrar(Personal $id){
        $id->delete();
        return redirect()->route('personal');
    }
}
