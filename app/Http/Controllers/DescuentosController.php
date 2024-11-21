<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Descuentos;

class DescuentosController extends Controller
{
    public function descuentos()
    {
        return view('descuentos', [
            'descuentos' => Descuentos::paginate(10)
        ]);
    }

    public function descuento_alta()
    {
        return view("descuento_alta");
    }
    public function datosGrafica()
    {
        $datos = Descuentos::select('nombre', \DB::raw('COUNT(*) as total'))
            ->groupBy('nombre')
            ->get();
        
        $nombre = $datos->pluck('nombre')->toArray(); 
        $totales = $datos->pluck('total')->toArray();
    
        // Agregar una nueva consulta para la gráfica de cantidad
        $datosCantidad = Descuentos::select(\DB::raw('cantidad, COUNT(*) as total'))
            ->groupBy('cantidad')
            ->get();
    
        $cantidades = $datosCantidad->pluck('cantidad')->toArray();
        $totalesCantidad = $datosCantidad->pluck('total')->toArray();
    
        return response()->json([
            'labels' => $nombre,
            'data' => $totales,
            'labelsCantidad' => $cantidades,
            'dataCantidad' => $totalesCantidad,
        ]);
    }
    
    public function exportarCSV()
    {
        $fileName = "descuentos.csv";

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        $output = fopen('php://output', 'w');
        fputcsv($output, ['ID', 'Nombre', 'Cantidad', 'Activo', 'Fecha de Creación', 'Última Actualización']);

        $descuentos = Descuentos::all();

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

        fclose($output);
        exit();
    }

    public function buscar(Request $request)
    {
        $buscar = $request->get('buscar');

        $descuentos = Descuentos::where('nombre', 'like', "%$buscar%")
                                ->orWhere('cantidad', 'like', "%$buscar%")
                                ->paginate(10);

        return view('descuentos', [
            'descuentos' => $descuentos
        ]);
    }

    public function descuento_registrar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required|numeric',
            'activo' => 'required|boolean'
        ]);

        Descuentos::create($request->only(['nombre', 'cantidad', 'activo']));

        return redirect()->route('descuentos')->with('success', 'Registrado exitosamente');
    }

    public function descuento_detalle($id)
    {
        $descuento = Descuentos::find($id);

        if (!$descuento) {
            return redirect()->route('descuentos')->with('error', 'Descuento no encontrado');
        }

        return view("descuento_detalle", compact('descuento'));
    }

    public function descuento_editar($id)
    {
        $descuento = Descuentos::find($id);

        if (!$descuento) {
            return redirect()->route('descuentos')->with('error', 'Descuento no encontrado');
        }

        return view('descuento_editar', compact('descuento'));
    }

    public function descuento_salvar(Request $request, $id)
    {
        $descuento = Descuentos::find($id);

        if (!$descuento) {
            return redirect()->route('descuentos')->with('error', 'Descuento no encontrado');
        }

        $request->validate([
            'nombre' => 'required',
            'activo' => 'required|boolean'
        ]);

        $descuento->update($request->only(['nombre', 'activo']));

        return redirect()->route("descuento_editar", ['id' => $id]);
    }

    public function descuento_borrar($id)
    {
        $descuento = Descuentos::find($id);

        if (!$descuento) {
            return redirect()->route('descuentos')->with('error', 'Descuento no encontrado');
        }

        $descuento->delete();
        return redirect()->route('descuentos')->with('success', 'Descuento eliminado');
    }
}
