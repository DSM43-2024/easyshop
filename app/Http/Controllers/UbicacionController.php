<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ubicacion;

class UbicacionController extends Controller
{
    public function ubicacion()
    {
        // Paginación de 10 elementos por página
        $ubicacion = Ubicacion::paginate(10);

        return view('ubicacion', compact('ubicacion')); // Utilizando compact para enviar la variable a la vista
    }
    public function exportarCSV()
    {
        $fileName = "ubicaciones.csv";
    
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
    
        $output = fopen('php://output', 'w');
    
        // Encabezados
        fputcsv($output, ['ID', 'Estante', 'Pasillo', 'Fecha de Creación', 'Última Actualización']);
    
        // Datos de la base
        $ubicaciones = Ubicacion::all();
    
        foreach ($ubicaciones as $ubicacion) {
            fputcsv($output, [
                $ubicacion->id, 
                $ubicacion->estante, 
                $ubicacion->pasillo, 
                $ubicacion->created_at, 
                $ubicacion->updated_at
            ]);
        }
    
        fclose($output);
        exit();
    }
    
    public function ubicacion_alta()
    {
        return view('ubicacion_alta');
    }
    public function buscarUbicacion(Request $request)
    {
        $buscar = $request->get('buscar');
    
        // Buscar ubicaciones por estante o pasillo
        $ubicacion = Ubicacion::where('estante', 'like', "%$buscar%")
                                ->orWhere('pasillo', 'like', "%$buscar%")
                                ->paginate(10); // Paginación de resultados
    
        // Retornar la vista con las ubicaciones filtradas
        return view('ubicacion', compact('ubicacion'));
    }
    public function datosGrafica()
    {
        $datos = Ubicacion::select('estante', \DB::raw('COUNT(*) as total'))
            ->groupBy('estante')
            ->get();
    
        $estantes = $datos->pluck('estante')->toArray(); 
        $totales = $datos->pluck('total')->toArray(); 
    
        return response()->json([
            'labels' => $estantes,
            'data' => $totales,
        ]);
    }
    public function datosGraficaPorPasillo()
{
    $datos = Ubicacion::select('pasillo', \DB::raw('COUNT(*) as total'))
        ->groupBy('pasillo')
        ->get();

    $pasillos = $datos->pluck('pasillo')->toArray(); // Extraemos los pasillos
    $totales = $datos->pluck('total')->toArray(); // Extraemos los totales por pasillo

    return response()->json([
        'labels' => $pasillos,
        'data' => $totales,
    ]);
}

    public function ubicacion_registrar(Request $request)
    {
        $this->validate($request, [
            'estante' => 'required',
            'pasillo' => 'required',
        ]);

        // Crear una nueva ubicación y guardar
        Ubicacion::create([
            'estante' => $request->input('estante'),
            'pasillo' => $request->input('pasillo'),
        ]);

        return redirect()->route('ubicacion')->with('success', 'Ubicación registrada exitosamente');
    }

    public function ubicacion_detalle($id)
    {
        // Usamos findOrFail para manejar excepciones si no se encuentra la ubicación
        $ubicacion = Ubicacion::findOrFail($id);
        return view('ubicacion_detalle', compact('ubicacion'));
    }

    public function ubicacion_editar($id)
    {
        // Usamos findOrFail aquí también
        $ubicacion = Ubicacion::findOrFail($id);
        return view('ubicacion_editar', compact('ubicacion'));
    }

    public function ubicacion_salvar(Request $request, $id)
    {
        $this->validate($request, [
            'estante' => 'required',
            'pasillo' => 'required',
        ]);

        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->estante = $request->input('estante');
        $ubicacion->pasillo = $request->input('pasillo');
        $ubicacion->save();

        return redirect()->route('ubicacion_editar', ['id' => $id])->with('success', 'Ubicación actualizada exitosamente');
    }

    public function ubicacion_borrar($id)
    {
        // Usamos findOrFail para asegurar que el registro exista
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->delete();

        return redirect()->route('ubicacion')->with('success', 'Ubicación eliminada exitosamente');
    }
}
