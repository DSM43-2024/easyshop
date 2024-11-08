<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ubicacion;

class UbicacionController extends Controller
{
    public function ubicacion()
    {
        return view('ubicacion')->with(['ubicacion' => Ubicacion::all()]);
    }

    public function ubicacion_alta()
    {
        return view('ubicacion_alta');
    }

    public function ubicacion_registrar(Request $request)
    {
        $this->validate($request, [
            'estante' => 'required',
            'pasillo' => 'required',
        ]);

        $ubicacion = new Ubicacion();
        $ubicacion->estante = $request->input('estante');
        $ubicacion->pasillo = $request->input('pasillo');
        $ubicacion->save();

        return redirect()->route('ubicacion')->with('success', 'Ubicación registrada exitosamente');
    }

    public function ubicacion_detalle($id)
    {
        $ubicacion = Ubicacion::find($id);
        return view('ubicacion_detalle')->with(['ubicacion' => $ubicacion]);
    }

    public function ubicacion_editar($id)
    {
        $ubicacion = Ubicacion::find($id);
        return view('ubicacion_editar')->with(['ubicacion' => $ubicacion]);
    }

    public function ubicacion_salvar(Request $request, $id)
    {
        $this->validate($request, [
            'estante' => 'required',
            'pasillo' => 'required',
        ]);

        $ubicacion = Ubicacion::find($id);
        $ubicacion->estante = $request->input('estante');
        $ubicacion->pasillo = $request->input('pasillo');
        $ubicacion->save();

        return redirect()->route('ubicacion_editar', ['id' => $id])->with('success', 'Ubicación actualizada exitosamente');
    }

    public function ubicacion_borrar($id)
    {
        $ubicacion = Ubicacion::find($id);
        $ubicacion->delete();
        return redirect()->route('ubicacion')->with('success', 'Ubicación eliminada exitosamente');
    }
}
