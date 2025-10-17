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
        Schema::create('razonessociales', function (Blueprint $table) {
          $table->string('nombre', 255); // Nombre o Razón Social de la empresa
          $table->integer('estatus'); // Estatus de la razon social
          $table->string('rfc', 13)->unique(); // RFC de la empresa (13 caracteres)
          $table->string('curp', 18)->nullable(); // CURP (opcional, en caso de personas físicas)
          $table->string('direccion', 255); // Dirección fiscal
          $table->string('colonia', 100); // Colonia de la dirección fiscal
          $table->string('codigo_postal', 5); // Código Postal de la dirección fiscal
          $table->string('municipio', 100); // Municipio o Delegación
          $table->string('estado', 100); // Estado de la República
          $table->string('pais', 100)->default('México'); // País (por defecto México)
          $table->string('telefono', 15)->nullable(); // Teléfono de contacto (opcional)
          $table->string('email', 100)->nullable(); // Email de contacto (opcional)
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('razonessociales');
    }
};
