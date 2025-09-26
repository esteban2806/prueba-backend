<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NotaDeCompra;

class NotaDeCompraController extends Controller
{
    public function index()
    {
        return response()->json(NotaDeCompra::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'observaciones' => 'nullable|string',
        ]);

        $nota = NotaDeCompra::create($request->all());
        return response()->json($nota, 201);
    }

    public function show($id)
    {
        $nota = NotaDeCompra::find($id);
        if (!$nota) {
            return response()->json(['mensaje' => 'Nota no encontrada'], 404);
        }
        return response()->json($nota, 200);
    }

    public function update(Request $request, $id)
    {
        $nota = NotaDeCompra::find($id);
        if (!$nota) {
            return response()->json(['mensaje' => 'Nota no encontrada'], 404);
        }

        $request->validate([
            'cliente_id' => 'sometimes|exists:clientes,id',
            'fecha' => 'sometimes|date',
            'observaciones' => 'nullable|string',
        ]);

        $nota->update($request->all());
        return response()->json($nota, 200);
    }

    public function destroy($id)
    {
        $nota = NotaDeCompra::find($id);
        if (!$nota) {
            return response()->json(['mensaje' => 'Nota no encontrada'], 404);
        }

        $nota->delete();
        return response()->json(['mensaje' => 'Nota eliminada correctamente'], 200);
    }
    public function calcularTotal($id)
    {
        $nota = NotaDeCompra::with('productos')->find($id);

        if (!$nota) {
            return response()->json(['mensaje' => 'Nota no encontrada'], 404);
        }

        // suma = precio * cantidad (de la tabla pivote)
        $total = $nota->productos->sum(function ($producto) {
            return $producto->pivot->cantidad * $producto->pivot->precio;
        });

        return response()->json([
            'nota_id' => $nota->id,
            'cliente_id' => $nota->cliente_id,
            'total' => $total
        ]);
    }
}
