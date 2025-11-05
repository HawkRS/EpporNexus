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
    Schema::create('pago_individuals', function (Blueprint $table) {
      $table->id();

      // Relaciones
      $table->foreignId('semana_id')->constrained('semana_pagos')->onDelete('cascade');
      $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade'); // Asume que tienes una tabla 'empleados'

      // Para trabajos de destajo/proyecto
      $table->foreignId('trabajo_id')->nullable()->constrained('trabajo_proyectos')->onDelete('set null')->comment('El trabajo al que se aplica el sueldo base o el extra de esta semana.');

      // Detalles del Pago
      $table->integer('dias_pagados')->default(7)->comment('Días pagados (7 por una semana completa).');
      $table->decimal('sueldo_base_semanal', 10, 2)->default(0.00)->comment('Sueldo fijo o abono semanal pre-acordado.');
      $table->decimal('extras_bonos_destajo', 10, 2)->default(0.00)->comment('Pago extra por destajo final, bonos, o trabajo adicional.');
      $table->decimal('deducciones', 10, 2)->default(0.00)->comment('Abonos a préstamos, faltas injustificadas, etc.');

      // Total calculado (sueldo_base + extras - deducciones)
      $table->decimal('total_neto_pagado', 10, 2)->comment('Total final pagado al empleado esa semana.');

      // Comentarios específicos del empleado
      $table->text('comentarios_empleado')->nullable()->comment('Ej: Faltó lunes, abono a préstamo, etc.');

      $table->timestamps();
      $table->softDeletes(); // Útil para cotizador (mantener el historial)
    });
  }

  /**
  * Reverse the migrations.
  */
  public function down(): void
  {
    Schema::dropIfExists('pago_individuals');
  }
};
