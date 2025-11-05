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
    Schema::create('trabajo_proyectos', function (Blueprint $table) {
      $table->id();
      $table->string('nombre')->comment('Descripción o nombre del trabajo/proyecto/destajo.');
      $table->enum('tipo', ['destajo', 'proyecto_monto_fijo'])->comment('Tipo de pago asociado: destajo (por pieza) o proyecto (monto fijo).');
      $table->decimal('valor_total_proyecto', 10, 2)->comment('El costo total acordado del proyecto o destajo.');
      $table->enum('estado', ['activo', 'finalizado', 'cancelado'])->default('activo');

      // Este campo se calculará en el modelo, no se guarda en DB, pero es útil.
      // $table->decimal('pagado_acumulado', 10, 2)->default(0.00)->comment('El total pagado hasta ahora por este trabajo.');

      $table->timestamps();
      $table->softDeletes(); // Útil para cotizador (mantener el historial)
    });
  }

  /**
  * Reverse the migrations.
  */
  public function down(): void
  {
    Schema::dropIfExists('trabajo_proyectos');
  }
};
