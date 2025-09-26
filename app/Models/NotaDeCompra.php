<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotaDeCompra extends Model
{
    protected $table = 'notas_de_compra';
    protected $fillable = ['cliente_id','fecha','observaciones'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'nota_producto','nota_compra_id', 'producto_id')
                    ->withPivot(['cantidad','precio'])
                    ->withTimestamps();
    }

    public function calcularTotal()
    {
        return $this->productos->sum(function($p){
            return $p->pivot->cantidad * $p->pivot->precio;
        });
    }
}
