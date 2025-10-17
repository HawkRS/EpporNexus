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
        Schema::create('cotizaciones', function (Blueprint $table) {
          $table->id();
          $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
          $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); // Para el vendedor
          $table->date('fecha')->nullable();
          $table->integer('folio')->unique(); // Folio incremental
          $table->decimal('subtotal', 10, 2);
          $table->decimal('iva', 10, 2);
          $table->decimal('total', 10, 2)->default(0); // Total del pedido
          $table->decimal('saldo', 10, 2)->default(0); // Saldo del pedido
          $table->string('estado')->default('ordenado'); // Estado del pedido (ordenado, en proceso, terminado, etc.)
          $table->string('metodo_entrega')->default('cliente'); // Método de entrega: 'cliente' o 'enviado'
          $table->boolean('factura')->default(false); // Si el pedido es con factura o no
          $table->longText('comentarios')->nullable();
          $table->softDeletes();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizaciones');
    }
};
