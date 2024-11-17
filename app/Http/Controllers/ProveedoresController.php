<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Proveedores; 

class ProveedoresController extends Controller
{
    public function proveedores(){
        return view('proveedores')
        ->with(['proveedores' => Proveedores::paginate(10)]); // paginate 10 items per page

    }

    public function exportarCSV()
    {
        $fileName = "proveedores.csv";
    
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
    
        $output = fopen('php://output', 'w');
    
        // Encabezados
        fputcsv($output, ['ID', 'Nombre', 'Email', 'Fecha de Creación', 'Última Actualización']);
    
        // Datos de la base
        $proveedores = Proveedores::all();
    
        foreach ($proveedores as $proveedor) {
            fputcsv($output, [
                $proveedor->id, 
                $proveedor->nombre, 
                $proveedor->email, 
                $proveedor->created_at, 
                $proveedor->updated_at
            ]);
        }
    
        fclose($output);
        exit();
    }
    // En ProveedorController.php
public function buscar(Request $request)
{
    $buscar = $request->get('buscar');
    
    // Buscar proveedores por nombre o email
    $proveedores = Proveedores::where('nombre', 'like', "%$buscar%")
                            ->orWhere('email', 'like', "%$buscar%")
                            ->paginate(10); // Paginación de resultados

    // Retornar la vista con los proveedores filtrados
    return view('proveedores', compact('proveedores'));
}


    public function proveedor_registrar(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
        ]);

        $proveedor = new Proveedores();
        $proveedor->nombre = $request->input('nombre');
        $proveedor->email = $request->input('email');
        $proveedor->save();

        return redirect()->route('proveedores')->with('success', 'Proveedor registrado exitosamente');
    }

    public function proveedor_detalle($id){
        $proveedor = Proveedores::find($id);
        return view("proveedores_detalle")->with(['proveedor' => $proveedor]);
    }

    public function proveedor_editar($id){
        $proveedor = Proveedores::find($id);
        return view('proveedores_editar')->with(['proveedor' => $proveedor]);
    }
    public function proveedor_alta()  {
        return view("proveedor_alta");
    }
    public function proveedor_salvar(Request $request, $id) {
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
        ]);

        $proveedor = Proveedores::find($id);
        $proveedor->nombre = $request->input('nombre'); 
        $proveedor->email = $request->input('email');    
        $proveedor->save();

        return redirect()->route("proveedores_editar", ['id' => $id])->with('success', 'Proveedor actualizado exitosamente');
    }

    public function proveedor_borrar($id){
        $proveedor = Proveedores::find($id);
        $proveedor->delete();
        return redirect()->route('proveedores')->with('success', 'Proveedor eliminado exitosamente');
    }
}
