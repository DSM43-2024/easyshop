<?php
namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use App\Models\Proveedores_Productos;

class ProveedoresProductosController extends Controller
{
    public function pp()
    {
        $proveedores = Proveedores::with('productos')->get();
        $productos = Productos::all();
        $pp = Proveedores_Productos::with(['proveedor', 'producto'])->get(); // Cargar relaciones

        // Llamar a la función para obtener los datos del gráfico
        $chartData = $this->getChartData($proveedores);

        return view('pp')->with([
            'proveedores' => $proveedores,
            'productos' => $productos,
            'pp' => $pp,
            'labels' => $chartData['labels'],
            'counts' => $chartData['counts'],
        ]);
    }

    public function pp_registrar(Request $request)
    {
        $request->validate([
            'id_proveedor' => 'required',
            'id_producto' => 'required',
        ]);

        $pp = new Proveedores_Productos();
        $pp->id_proveedor = $request->input('id_proveedor');
        $pp->id_producto = $request->input('id_producto');
        $pp->save();

        return redirect()->route('pp')->with('success', 'Registrado exitosamente');
    }

    public function pp_borrar(Proveedores_Productos $id)
    {
        $id->delete();
        return redirect()->route('pp')->with('success', 'Eliminado exitosamente');
    }

    // Función separada para generar los datos del gráfico
    private function getChartData($proveedores)
    {
        // Obtener los datos para la gráfica
        $proveedores_data = $proveedores->map(function($proveedor) {
            return [
                'label' => $proveedor->nombre,
                'count' => $proveedor->productos->count(),
            ];
        });

        // Preparar los datos para el gráfico
        $labels = $proveedores_data->pluck('label')->toArray();
        $counts = $proveedores_data->pluck('count')->toArray();

        return [
            'labels' => $labels,
            'counts' => $counts,
        ];
    }
}
