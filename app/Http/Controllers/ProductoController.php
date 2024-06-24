<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use BadMethodCallException;

class ProductoController extends Controller
{
    public function index() {
        $productos = Producto::paginate(10);
        return view('productos.index', compact('productos'));
    }

    public function create() {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }
    
    public function store(Request $request) {
        $request->validate([
            'ID_categorias' => 'required|exists:categorias,ID_categorias',
            'Cod_Barra_producto' => 'required|string|max:255',
            'Nom_producto' => 'required|string|max:255',
            'Precio_producto' => 'required|numeric',
            'Cantida_producto' => 'required|integer',
            'Img_producto' => 'required|string|max:255',
            'Stock_producto' => 'required|integer',
            'Desc_producto' => 'required|string|max:255',
            'Estado_producto' => 'required|string|max:50'
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto) {
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto) { 
        $request->validate([
            'ID_categorias' => 'required|exists:categorias,ID_categorias',
            'Cod_Barra_producto' => 'required|string|max:255',
            'Nom_producto' => 'required|string|max:255',
            'Precio_producto' => 'required|numeric',
            'Cantida_producto' => 'required|integer',
            'Img_producto' => 'required|string|max:255',
            'Stock_producto' => 'required|integer',
            'Desc_producto' => 'required|string|max:255',
            'Estado_producto' => 'required|string|max:50'
        ]);

        $producto->update($request->all());
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        try {
            // Verificar si el producto tiene detalles de ingreso asociados
            if ($producto->detallesIngreso()->exists()) {
                return redirect()->route('productos.index')->with('error', 'No se puede eliminar el producto porque tiene detalles de ingreso asociados.');
            }

            // Si no tiene detalles de ingreso asociados, proceder a eliminar el producto
            $producto->delete();

            return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');

        } catch (BadMethodCallException $e) {
            return redirect()->route('productos.index')->with('error', 'No se puede eliminar el producto en este momento.');

        } catch (QueryException $e) {
            // Manejar excepciones específicas si es necesario
            return redirect()->route('productos.index')->with('error', 'Ocurrió un error al intentar eliminar el producto.');
        }
    }

}

