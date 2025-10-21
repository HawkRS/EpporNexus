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
        Schema::create('ingresos', function (Blueprint $table) {
          $table->id();
          $table->date('fecha');
          $table->foreignId('clientes_id')->constrained('clientes');
          $table->string('rfc');
          $table->string('estatus');
          $table->string('folio')->nullable();
          $table->integer('test')->nullable();
          $table->double('subtotal')->nullable();
          $table->double('iva')->nullable();
          $table->double('total')->nullable();
          $table->softDeletes();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresos');
    }
};
