<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaProducto extends Model
{
    use HasFactory;

    protected $table = 'nota_producto';

    protected $fillable = [
        'nota_compra_id',
        'producto_id',
        'cantidad',
        'precio',
    ];

    public function nota()
    {
        return $this->belongsTo(NotaDeCompra::class, 'nota_de_compra_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
