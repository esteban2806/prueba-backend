<?php
namespace App\Services;

use App\Models\NotaDeCompra;
use App\Repositories\NotaRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class NotaService {
    protected $repo;
    public function __construct(NotaRepositoryInterface $repo) { $this->repo = $repo; }

    public function crearConProductos(array $data) {
        return DB::transaction(function() use ($data) {
            // crear nota
            $nota = $this->repo->create([
                'cliente_id' => $data['cliente_id'],
                'fecha' => $data['fecha'],
                'observaciones' => $data['observaciones'] ?? null
            ]);

            // preparar attach data
            $attach = [];
            foreach ($data['productos'] as $item) {
                $producto = Producto::findOrFail($item['producto_id']);
                if ($producto->stock < $item['cantidad']) {
                    throw new \Exception("Stock insuficiente para producto ID {$producto->id}");
                }
                // reducir stock
                $producto->decrement('stock', $item['cantidad']);
                $attach[$producto->id] = [
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $item['precio_unitario'],
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }

            $nota->productos()->attach($attach);

            return $nota->load('productos');
        });
    }

    public function calcularTotal($notaId) {
        $nota = NotaDeCompra::with('productos')->findOrFail($notaId);
        return $nota->calcularTotal();
    }
}
