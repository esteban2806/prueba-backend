v<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nota_producto', function (Blueprint $table) {
            $table->id();

            // Relación con la tabla notas_de_compra
            $table->unsignedBigInteger('nota_compra_id');
            $table->foreign('nota_compra_id')
                  ->references('id')
                  ->on('notas_de_compra')
                  ->onDelete('cascade');

            // Relación con la tabla productos
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')
                  ->references('id')
                  ->on('productos')
                  ->onDelete('cascade');

            // Campos adicionales de la relación
            $table->integer('cantidad');
            $table->decimal('precio', 10, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nota_producto');
    }
};
