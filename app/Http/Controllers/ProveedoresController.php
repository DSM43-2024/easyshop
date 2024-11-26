<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Proveedores; 

class ProveedoresController extends Controller
{
    public function proveedores(){
        return view('proveedores')
        ->with(['proveedores' => Proveedores::paginate(10)]); // paginate 10 items per page
    }

    public function exportarCSV(Request $request)
    {
        // Obtener los filtros de búsqueda y la paginación
        $buscar = $request->get('buscar');
        $proveedoresQuery = Proveedores::query();
    
        if ($buscar) {
            $proveedoresQuery->where('nombre', 'like', "%$buscar%")
                ->orWhere('email', 'like', "%$buscar%");
        }
    
        // Obtener proveedores paginados según los filtros
        $proveedores = $proveedoresQuery->get();  // No usamos paginación para exportar todos los resultados
    
        $fileName = "proveedores.csv";
    
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
    
        $output = fopen('php://output', 'w');
    
        // Encabezados
        fputcsv($output, ['ID', 'Nombre', 'Email', 'Activo', 'Fecha de Creación', 'Última Actualización']);
    
        // Datos de la base
        foreach ($proveedores as $proveedor) {
            fputcsv($output, [
                $proveedor->id,
                $proveedor->nombre,
                $proveedor->email,
                $proveedor->activo ? 'Sí' : 'No',  // Mostrar 'Sí' o 'No' según el estado del proveedor
                $proveedor->created_at,
                $proveedor->updated_at
            ]);
        }
    
        fclose($output);
        exit();
    }
    

    public function datosGrafica()
{
    // Agrupar proveedores por mes y año de creación
    $datos = Proveedores::select(\DB::raw('DATE_FORMAT(created_at, "%Y-%m") as fecha'), \DB::raw('COUNT(*) as total'))
        ->groupBy('fecha')
        ->orderBy('fecha', 'asc')
        ->get();

    // Pluck para obtener los datos en formato de arrays
    $labels = $datos->pluck('fecha')->toArray();
    $totales = $datos->pluck('total')->toArray();

    return response()->json([
        'labels' => $labels,
        'pieData' => [ // Cambié la clave 'data' a 'pieData' para que coincida con lo que espera el frontend
            $totales[0], // Activos
            $totales[1]  // Inactivos
        ]
    ]);
}
public function obtenerDatosPorDominio()
{
    $proveedores = Proveedores::select(DB::raw('SUBSTRING_INDEX(email, "@", -1) as dominio'), DB::raw('count(*) as total'))
                            ->groupBy(DB::raw('SUBSTRING_INDEX(email, "@", -1)'))
                            ->get();

    $dominios = $proveedores->pluck('dominio');
    $totales = $proveedores->pluck('total');

    return response()->json([
        'dominios' => $dominios,
        'totales' => $totales
    ]);
}

    
    public function buscar(Request $request)
    {
        $buscar = $request->get('buscar');
    
        $proveedores = Proveedores::where('nombre', 'like', "%$buscar%")
                            ->orWhere('email', 'like', "%$buscar%")
                            ->paginate(10); // Paginación de resultados
    
        return view('proveedores', compact('proveedores'));
    }

    public function proveedor_registrar(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
            'activo' => 'required|boolean', // Validar el campo 'activo'
        ]);

        $proveedor = new Proveedores();
        $proveedor->nombre = $request->input('nombre');
        $proveedor->email = $request->input('email');
        $proveedor->activo = $request->input('activo'); // Guardar el valor de 'activo'
        $proveedor->save();

        return redirect()->route('proveedores')->with('success', 'Proveedor registrado exitosamente');
    }

    public function proveedor_detalle($id)
    {
        $proveedor = Proveedores::find($id);
        return view("proveedores_detalle")->with(['proveedor' => $proveedor]);
    }

    public function proveedor_editar($id)
    {
        $proveedor = Proveedores::find($id);
        return view('proveedor_editar')->with(['proveedor' => $proveedor]);
    }

    public function proveedor_alta()
    {
        return view("proveedor_alta");
    }

    public function proveedor_salvar(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
            'activo' => 'required|boolean', // Validar el campo 'activo'
        ]);

        $proveedor = Proveedores::find($id);
        $proveedor->nombre = $request->input('nombre');
        $proveedor->email = $request->input('email');
        $proveedor->activo = $request->input('activo'); // Actualizar el valor de 'activo'
        $proveedor->save();

        return redirect()->route("proveedor_editar", ['id' => $id])->with('success', 'Proveedor actualizado exitosamente');
    }

    public function proveedor_borrar($id)
    {
        $proveedor = Proveedores::find($id);
        $proveedor->delete();
        return redirect()->route('proveedores')->with('success', 'Proveedor eliminado exitosamente');
    }
    public function toggleActivo($id)
{
    $proveedor = Proveedores::findOrFail($id);
    $proveedor->activo = !$proveedor->activo;
    $proveedor->save();

    return redirect()->route('proveedores')->with('status', 'Proveedor actualizado correctamente.');
}

}
