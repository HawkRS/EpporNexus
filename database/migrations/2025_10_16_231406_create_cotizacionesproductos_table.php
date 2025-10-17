<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cotizacion_productos', function (Blueprint $table) {
          $table->id();
          $table->foreignId('cotizacion_id')->constrained('cotizaciones')->onDelete('cascade');
          $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
          $table->integer('cantidad')->default(1);
          $table->decimal('precio', 10, 2); // Precio personalizado por producto
          $table->decimal('descuento', 10, 2)->default(0); // Descuento aplicado en ese producto
          $table->decimal('total', 10, 2); // Total del producto (precio * cantidad - descuento)
          $table->softDeletes();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacionesproductos');
    }
};
