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
        Schema::create('pagoimss', function (Blueprint $table) {
          $table->id();
          $table->date('fecha');
          $table->integer('periodo');
          $table->integer('bimestre');
          $table->integer('estatus');
          $table->string('rfc');
          $table->float('monto');
          $table->integer('empleados');
          $table->date('fechadepago')->nullable();
          $table->string('linkpdf')->nullable();
          $table->softDeletes();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagoimss');
    }
};
