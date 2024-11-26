<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    public function categorias()
    {
        $tipos = Categorias::select('tipo')->distinct()->pluck('tipo')->toArray();
    
        return view('categorias', [
            'categorias' => Categorias::paginate(10),
            'tipos' => $tipos, // Pasa los tipos a la vista
        ]);
    }
    
    public function datosGrafica()
{
    // Obtener los datos de las categorías
    $datos = Categorias::select('tipo', \DB::raw('COUNT(*) as total'))
        ->groupBy('tipo')
        ->get();
    
    // Planteamos los datos para gráfico de dispersión
    $scatterData = $datos->map(function ($item) {
        return [
            'x' => $item->tipo, // En este caso, 'tipo' es el valor en el eje X
            'y' => $item->total, // 'total' es el valor en el eje Y
        ];
    });

    // Devolver los datos para la gráfica
    return response()->json([
        'data' => $scatterData,
    ]);
}

    
public function exportarCSV(Request $request)
{
    // Obtener los filtros de búsqueda
    $buscar = $request->get('buscar');
    $categoriasQuery = Categorias::query();

    // Si hay filtro de búsqueda, aplicarlo
    if ($buscar) {
        $categoriasQuery->where('nombre', 'like', "%$buscar%")
                        ->orWhere('tipo', 'like', "%$buscar%");
    }

    // Obtener todas las categorías (sin paginación) que coinciden con los filtros
    $categorias = $categoriasQuery->get();

    $fileName = "categorias.csv";

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');

    $output = fopen('php://output', 'w');

    // Encabezados
    fputcsv($output, ['ID', 'Nombre', 'Tipo', 'Fecha de Creación', 'Última Actualización']);

    // Datos de la base
    foreach ($categorias as $categoria) {
        fputcsv($output, [
            $categoria->id_categoria,
            $categoria->nombre,
            $categoria->tipo,
            $categoria->created_at,
            $categoria->updated_at
        ]);
    }

    fclose($output);
    exit();
}



    public function categoria_alta()
    {
        return view("categoria_alta");
    }

    public function categoria_registrar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
        ]);

        Categorias::create($request->only(['nombre', 'tipo']));

        return redirect()->route('categorias')->with('success', 'Registrado exitosamente');
    }

    public function categoria_detalle($id)
    {
        $categoria = Categorias::find($id);

        if (!$categoria) {
            return redirect()->route('categorias')->with('error', 'Categoría no encontrada');
        }

        return view("categoria_detalle", compact('categoria'));
    }
    public function graficaLinea()
{
    $datos = Categorias::selectRaw('DATE(created_at) as fecha, COUNT(*) as total')
        ->groupBy('fecha')
        ->orderBy('fecha')
        ->get();

    $fechas = $datos->pluck('fecha')->toArray(); // Fechas
    $totales = $datos->pluck('total')->toArray(); // Totales por fecha

    return response()->json([
        'labels' => $fechas,
        'data' => $totales,
    ]);
}


    public function categoria_editar($id)
    {
        $categoria = Categorias::find($id);

        if (!$categoria) {
            return redirect()->route('categorias')->with('error', 'Categoría no encontrada');
        }

        return view('categoria_editar', compact('categoria'));
    }

    public function categoria_salvar(Request $request, $id)
    {
        $categoria = Categorias::find($id);

        if (!$categoria) {
            return redirect()->route('categorias')->with('error', 'Categoría no encontrada');
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
        ]);

        $categoria->update($request->only(['nombre', 'tipo']));

        return redirect()->route("categoria_editar", ['id' => $id])->with('success', 'Categoría actualizada');
    }

    public function categoria_borrar($id)
    {
        $categoria = Categorias::find($id);

        if (!$categoria) {
            return redirect()->route('categorias')->with('error', 'Categoría no encontrada');
        }

        $categoria->delete();

        return redirect()->route('categorias')->with('success', 'Categoría eliminada');
    }

    public function buscar(Request $request)
    {
        $buscar = $request->get('buscar');
        $categoriasQuery = Categorias::query();
    
        if ($buscar) {
            $categoriasQuery->where('nombre', 'like', "%$buscar%")
                            ->orWhere('tipo', 'like', "%$buscar%");
        }
    
        $categorias = $categoriasQuery->paginate(10); // Paginación si es necesario
    
        return view('categorias', compact('categorias'));
    }
    
    
    public function graficaFechas()
{
    $datos = Categorias::selectRaw('DATE(created_at) as fecha, COUNT(*) as total')
        ->groupBy('fecha')
        ->orderBy('fecha')
        ->get();

    $fechas = $datos->pluck('fecha')->toArray(); // Fechas
    $totales = $datos->pluck('total')->toArray(); // Totales por fecha

    return response()->json([
        'labels' => $fechas,
        'data' => $totales,
    ]);
}

    
}
