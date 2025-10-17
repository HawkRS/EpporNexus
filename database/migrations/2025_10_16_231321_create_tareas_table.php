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
        Schema::create('tareas', function (Blueprint $table) {
          $table->id();
          $table->foreignId('users_id')->constrained();
          $table->string('tarea');
          $table->string('estatus');
          $table->date('fechalimite')->nullable();
          $table->integer('importancia')->nullable();
          $table->integer('asignadoa')->nullable();
          $table->integer('departamento');
          $table->softDeletes();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
