s<?php

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
        Schema::create('empleados', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('last');
          $table->date('birthday');
          $table->string('birthplace');
          $table->string('position');
          $table->string('phone1')->nullable();
          $table->string('phone2')->nullable();
          $table->double('salary', 10, 2);
          $table->char('gender', 1);
          $table->string('address');
          $table->char('status', 1);
          $table->string('nss')->nullable();
          $table->string('curp')->nullable();
          $table->string('rfc')->nullable();
          $table->date('departure')->nullable();
          $table->string('civilstate');
          $table->softDeletes();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado');
    }
};
