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
        Schema::create('productos', function (Blueprint $table) {
          $table->id();
          $table->string('codigo');
          $table->string('nombre');
          $table->integer('existencia');
          $table->string('descripcion')->nullable();
          $table->integer('categoria'); /* 1- IMPLEMENTOS  2-COMEDEROS   3- JAULAS   4- PISOS PORCICOLA */
          $table->string('img')->nullable();
          $table->double('costo')->nullable();
          $table->double('ganancia')->nullable();
          $table->float('ancho')->nullable();
          $table->float('largo')->nullable();
          $table->float('alto')->nullable();
          $table->float('peso')->nullable();
          $table->softDeletes();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
