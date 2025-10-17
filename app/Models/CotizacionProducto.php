<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CotizacionProducto extends Model
{
      use SoftDeletes;
  protected $table = 'cotizacion_productos';

  protected $fillable = [
      'cotizacion_id',
      'producto_id',
      'cantidad',
      'precio',
      'descuento',
      'total'
  ];

  // Relación con el modelo Pedido
  public function cotizacion()
  {
      return $this->belongsTo(Cotizacion::class);
  }

  // Relación con el modelo Producto
  public function producto()
  {
      return $this->belongsTo(Productos::class, 'producto_id');
  }
}
