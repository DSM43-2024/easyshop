<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Descuentos;

class DescuentosController extends Controller
{
    public function descuentos(){
        return view('descuentos')
        ->with(['descuentos' => Descuentos::paginate(10)]); // paginate 10 items per page
    }

    public function descuento_alta()  {
        return view("descuento_alta");
    }
    public function exportarCSV()
{
    // Nombre del archivo
    $fileName = "descuentos.csv";

    // Configuración de encabezados para la descarga
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');

    // Abrir un flujo de salida
    $output = fopen('php://output', 'w');

    // Escribir los encabezados de las columnas
    fputcsv($output, ['ID', 'Nombre', 'Cantidad', 'Activo', 'Fecha de Creación', 'Última Actualización']);

    // Obtener los datos de la base de datos
    $descuentos = Descuentos::all();

    // Escribir cada fila de datos
    foreach ($descuentos as $descuento) {
        fputcsv($output, [
            $descuento->id_descuento, 
            $descuento->nombre, 
            $descuento->cantidad, 
            $descuento->activo, 
            $descuento->created_at, 
            $descuento->updated_at
        ]);
    }

    // Cerrar el flujo de salida
    fclose($output);
    exit();
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
