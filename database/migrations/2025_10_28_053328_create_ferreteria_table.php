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
        Schema::create('ferreteria', function (Blueprint $table) {
          $table->id();

          // 1. Campos requeridos por el usuario (nombre, costo, cantidad, categoria)
          $table->string('codigo', 150)->unique()->comment('Nombre descriptivo del artículo.');
          $table->string('nombre', 150)->comment('Nombre descriptivo del artículo.');
          $table->string('categoria', 50)->comment('Clasificación (ej: Seguridad, Abrasivos, Soldadura).');
          $table->decimal('cantidad')->default(0)->comment('Stock disponible actualmente.');

          // Usamos decimal para precisión en costos
          $table->decimal('costo_unitario', 10, 4)->comment('Costo de adquisición por unidad.');

          // 2. Campos adicionales del plan conceptual
          $table->string('unidad_medida', 30)->default('pieza')->comment('Unidad de conteo (pieza, caja, rollo, etc).');
          $table->decimal('precio_venta', 10, 2)->nullable()->comment('Precio sugerido de venta (opcional).');

          // Control de tiempo y estado
          $table->timestamps();
          $table->softDeletes(); // Útil para cotizador (mantener el historial)
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ferreteria');
    }
};
