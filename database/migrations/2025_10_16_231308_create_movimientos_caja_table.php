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
        Schema::create('movimientos_caja', function (Blueprint $table) {
          $table->id();
          $table->enum('tipo', ['entrada', 'salida']);
          $table->decimal('monto', 10, 2);
          $table->enum('area', ['comidas', 'casa', 'salarios_casa', 'salarios_negocio', 'gastos_negocio', 'gasolinas', 'miscelaneos', 'prestamo','ingreso'])->nullable();
          $table->string('descripcion')->nullable(); // Para una breve descripción de cada movimiento
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos_caja');
    }
};
