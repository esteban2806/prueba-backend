<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index() {
        return Producto::all();
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0'
        ]);

        $producto = Producto::create($request->all());

        return response()->json($producto, 201);
    }

    public function show($id) {
        return Producto::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return response()->json($producto, 200);
    }

    public function destroy($id) {
        Producto::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
