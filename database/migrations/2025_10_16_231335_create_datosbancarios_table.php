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
        Schema::create('datosbancarios', function (Blueprint $table) {
          $table->id();
          $table->string('nombre'); // Nombre de la cuenta
          $table->string('titular');// Nombre del titular de la cuenta
          $table->string('clabe')->nullable(); // Numeroo de cuenta clabe
          $table->string('cuenta')->nullable(); // Número de cuenta
          $table->string('sucursal')->nullable(); // Número de sucursal
          $table->string('tarjeta')->nullable(); // Número de tarjeta de debito
          $table->string('banco')->nullable(); // Nombre de institución bancaria
          $table->softDeletes();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datosbancarios');
    }
};
