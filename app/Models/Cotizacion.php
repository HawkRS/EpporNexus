<?php

namespace App\Models;
use App\Models\Cotizacion;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cotizacion extends Model
{
    use SoftDeletes;
  protected $table = 'cotizaciones';
  protected $fillable = [
    'cliente_id',
    'usuario_id',
    'fecha',
    'folio',
    'subtotal',
    'iva',
    'total',
    'saldo',
    'estado',
    'metodo_entrega',
    'factura',
    'comentarios'
  ];

  public function cliente()
  {
    return $this->belongsTo(Clientes::class);
  }

  public function hasCliente() {
    //dd('hola');
    return $this->hasOne('App\Models\Clientes')->get();
  }
  public function usuario()
  {
    return $this->belongsTo(\App\User::class);
  }
  public function productos()
  {
      return $this->belongsToMany(Productos::class, 'cotizacion_productos', 'cotizacion_id', 'producto_id')
                  ->withPivot('cantidad', 'precio', 'descuento', 'total')
                  ->withTimestamps();
  }
}
