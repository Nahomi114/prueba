<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use BadMethodCallException;

class IngresoController extends Controller
{
    public function index()
    {
        $ingresos = Ingreso::with('proveedor')->paginate(10);
        return view('ingresos.index', compact('ingresos'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        $usuarios = User::all();
        return view('ingresos.create', compact('proveedores', 'usuarios'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'ID_proveedores' => 'required|exists:proveedores,ID_proveedores',
            'user_id' => 'required|exists:users,id',
            'tipo_comprob' => 'required',
            'serie_comprob' => 'required',
            'num_comprob' => 'required',
            'fec_ingreso' => 'required|date',
            'impuesto' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        Ingreso::create($request->all());
        return redirect()->route('ingresos.index');
    }

    // IngresoController.php

    public function edit(Ingreso $ingreso)
    {
        $proveedores = Proveedor::all();
        $usuarios = User::all(); // Obtener todos los usuarios
        return view('ingresos.edit', compact('ingreso', 'proveedores', 'usuarios'));
    }


    public function update(Request $request, Ingreso $ingreso)
    {
        $request->validate([
            'ID_proveedores' => 'required|exists:proveedores,ID_proveedores',
            'user_id' => 'required|exists:users,id',
            'tipo_comprob' => 'required',
            'serie_comprob' => 'required',
            'num_comprob' => 'required',
            'fec_ingreso' => 'required|date',
            'impuesto' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $ingreso->update($request->all());
        return redirect()->route('ingresos.index');
    }

    public function destroy(Ingreso $ingreso)
    {
        try {
            // Verificar si el ingreso tiene detalles de ingreso asociados
            if ($ingreso->detalles()->exists()) {
                return redirect()->route('ingresos.index')->with('error', 'No se puede eliminar el ingreso porque tiene detalles de ingreso asociados.');
            }

            // Si no tiene detalles de ingreso asociados, proceder a eliminar el ingreso
            $ingreso->delete();

            return redirect()->route('ingresos.index')->with('success', 'Ingreso eliminado correctamente.');

        } catch (BadMethodCallException $e) {
            return redirect()->route('ingresos.index')->with('error', 'No se puede eliminar el ingreso en este momento.');

        } catch (QueryException $e) {
            // Manejar excepciones específicas si es necesario
            return redirect()->route('ingresos.index')->with('error', 'Ocurrió un error al intentar eliminar el ingreso.');
        }
    }

}
