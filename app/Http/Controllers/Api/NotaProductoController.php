<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NotaProducto;

class NotaProductoController extends Controller
{
    public function index()
    {
        return response()->json(NotaProducto::with(['nota', 'producto'])->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nota_compra_id' => 'required|exists:notas_de_compra,id',
            'producto_id'    => 'required|exists:productos,id',
            'cantidad'       => 'required|integer|min:1',
            'precio'=> 'required|numeric|min:0',
        ]);

        $notaProducto = NotaProducto::create($request->only([
            'nota_compra_id', 'producto_id', 'cantidad', 'precio'
        ]));

        return response()->json([
            'mensaje'       => 'Registro en nota_producto creado correctamente',
            'nota_producto' => $notaProducto
        ], 201);
    }

    public function show($id)
    {
        $notaProducto = NotaProducto::with(['nota', 'producto'])->find($id);
        if (!$notaProducto) {
            return response()->json(['mensaje' => 'Registro no encontrado'], 404);
        }
        return response()->json($notaProducto, 200);
    }

    public function update(Request $request, $id)
    {
        $notaProducto = NotaProducto::find($id);
        if (!$notaProducto) {
            return response()->json(['mensaje' => 'Registro no encontrado'], 404);
        }

        $request->validate([
            'cantidad'       => 'sometimes|integer|min:1',
            'precio'=> 'sometimes|numeric|min:0',
        ]);

        $notaProducto->update($request->only([
            'cantidad', 'precio'
        ]));

        return response()->json([
            'mensaje'       => 'Registro actualizado correctamente',
            'nota_producto' => $notaProducto
        ], 200);
    }

    public function destroy($id)
    {
        $notaProducto = NotaProducto::find($id);
        if (!$notaProducto) {
            return response()->json(['mensaje' => 'Registro no encontrado'], 404);
        }

        $notaProducto->delete();
        return response()->json(['mensaje' => 'Registro eliminado correctamente'], 200);
    }
}

