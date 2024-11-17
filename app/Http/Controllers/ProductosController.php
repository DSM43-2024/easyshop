<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categorias;
use App\Models\Ubicacion;
use App\Models\Descuentos;

class ProductosController extends Controller
{
    public function productos()
    {
        // Obtener todos los registros de las tablas relacionadas sin las relaciones innecesarias
        $categorias = Categorias::all();
        $descuentos = Descuentos::all();
        $ubicaciones = Ubicacion::all();
        $productos = Productos::with(['categoria', 'descuento', 'ubicacion'])->paginate(10); // Paginación

        return view('productos')->with([
            'categorias' => $categorias,
            'descuentos' => $descuentos,
            'ubicaciones' => $ubicaciones,
            'productos' => $productos,
        ]);
    }

    public function producto_registrar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'stock' => 'required',
            'precio' => 'required',
            'caducidad' => 'required',
            'id_categoria' => 'required',
            'id_descuento' => 'nullable',
            'id_ubicacion' => 'required',
        ]);

        $producto = new Productos();
        $producto->nombre = $request->input('nombre');
        $producto->stock = $request->input('stock');
        $producto->precio = $request->input('precio');
        $producto->caducidad = $request->input('caducidad');
        $producto->id_categoria = $request->input('id_categoria');
        $producto->id_descuento = $request->input('id_descuento');
        $producto->id_ubicacion = $request->input('id_ubicacion');
        $producto->activo = $request->has('activo') ? true : false; // Si está marcado, se guarda como 'true'

        $producto->save();

        return redirect()->route('productos')->with('success', 'Registrado exitosamente');
    }

    public function producto_borrar(Productos $id)
    {
        // Eliminar el producto por su ID
        $id->delete();

        // Redirigir o retornar mensaje
        return redirect()->route('productos')->with('success', 'Producto eliminado exitosamente');
    }



}
