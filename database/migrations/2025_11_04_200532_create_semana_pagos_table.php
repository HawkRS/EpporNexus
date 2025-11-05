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
    Schema::create('semana_pagos', function (Blueprint $table) {
      $table->id();
      $table->date('fecha_inicio')->comment('Fecha de inicio de la semana de pago (ej. Lunes)');
      $table->date('fecha_fin')->comment('Fecha de fin de la semana de pago (ej. Domingo)');

      // Campo de la Bitácora Semanal
      $table->text('comentarios_semana')->nullable()->comment('Bitácora de lo que se fabricó y tomó esa semana.');

      // Total calculado (suma de los PagoIndividual en el backend)
      $table->decimal('total_pagado', 10, 2)->default(0.00)->comment('Suma de todos los pagos individuales de la semana.');

      $table->timestamps();
      $table->softDeletes(); // Útil para cotizador (mantener el historial)
    });
  }

  /**
  * Reverse the migrations.
  */
  public function down(): void
  {
    Schema::dropIfExists('semana_pagos');
  }
};
