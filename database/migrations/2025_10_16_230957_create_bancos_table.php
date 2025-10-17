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
        Schema::create('bancos', function (Blueprint $table) {
          $table->id();
          $table->string('banco');
          $table->string('cuenta');
          $table->string('sucursal');
          $table->string('clabe');
          $table->string('referencia');
          $table->string('tarjeta');
          $table->unsignedBigInteger('clientes_id');
          $table->foreign('clientes_id')->references('id')->on('clientes');
          $table->softDeletes();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bancos');
    }
};
