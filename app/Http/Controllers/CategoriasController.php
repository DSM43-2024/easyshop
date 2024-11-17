<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    public function categorias()
    {
        return view('categorias', [
            'categorias' => Categorias::paginate(10)
        ]);
    }

    public function exportarCSV()
    {
        $fileName = "categorias.csv";

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        $output = fopen('php://output', 'w');

        fputcsv($output, ['ID', 'Nombre', 'Tipo', 'Fecha de Creación', 'Última Actualización']);

        $categorias = Categorias::all();

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

        $categorias = Categorias::where('nombre', 'like', "%$buscar%")
                                ->orWhere('tipo', 'like', "%$buscar%")
                                ->paginate(10);

        return view('categorias', [
            'categorias' => $categorias
        ]);
    }
}
