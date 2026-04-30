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
      Schema::create('permiso_rol', function (Blueprint $table) {
          $table->id();
          $table->foreignId('rol_id')->constrained('roles')->cascadeOnDelete();
          $table->foreignId('permiso_id')->constrained('permisos')->cascadeOnDelete();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permiso_rol');
    }
};
