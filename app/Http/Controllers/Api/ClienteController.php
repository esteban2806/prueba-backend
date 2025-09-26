<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ClienteService;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;

class ClienteController extends Controller
{
    protected $service;
    public function __construct(ClienteService $service) { $this->service = $service; }

    public function index() {
        return response()->json($this->service->listarClientes());
    }
    public function store(ClienteRequest $request) {
        return response()->json($this->service->crearCliente($request->validated()), 201);
    }
    public function show($id) {
        return response()->json($this->service->verCliente($id));
    }
    public function update(ClienteRequest $request, $id) {
        return response()->json($this->service->actualizarCliente($id, $request->validated()));
    }
    public function destroy($id) {
        $this->service->eliminarCliente($id);
        return response()->json(null, 204);
    }
    // Extra 1: Consultar todas las notas de un cliente con sus productos
    public function notasConProductos($id) {
        $cliente = \App\Models\Cliente::with('notas.productos')->find($id);

        if (!$cliente) {
            return response()->json(['mensaje' => 'Cliente no encontrado'], 404);
        }

        return response()->json($cliente->notas, 200);
    }
    // Extra: obtener notas con productos
    public function notas($id) {
        $cliente = $this->service->verCliente($id);
        $cliente->load('notas.productos');
        return response()->json($cliente->notas);
    }
}
