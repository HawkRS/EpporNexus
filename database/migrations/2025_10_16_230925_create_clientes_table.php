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
        Schema::create('clientes', function (Blueprint $table) {
          $table->id();
          $table->string('identificador')->unique();
          $table->string('razonsocial')->unique();
          $table->string('rfc');
          $table->string('correo')->nullable();
          $table->string('telefono')->nullable();
          $table->string('direccion')->nullable();
          $table->string('colonia')->nullable();
          $table->string('municipio')->nullable();
          $table->string('estado')->nullable();
          $table->string('pais')->nullable();
          $table->string('codigopostal')->nullable();
          $table->softDeletes();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
