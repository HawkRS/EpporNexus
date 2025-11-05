<?php

namespace App\Models;
use App\Models\Productos;
use App\Models\Guias;
use Carbon\Carbon;


use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{


  protected $fillable = [
    'cliente_id',
    'usuario_id',
    'folio',
    'subtotal',
    'iva',
    'total',
    'saldo',
    'estado',
    'metodo_entrega',
    'foliofiscal',
    'paqueteria',
    'numero_guia',
    'comentarios',
    'canaldeventa',
    'factura',
    'fecha'
  ];

  public function cliente()
  {
    return $this->belongsTo(Clientes::class);
  }

  public function hasCliente() {
    return($this->belongsTo('App\Models\Clientes', 'cliente_id', 'id')->first());
    //return $this->belongsTo('App\Models\Clientes')->first();
  }

  public function HasGuia() {
    //dd($this->hasOne('App\Models\Guias', 'pedido_id', 'id')->get());
    return $this->hasOne('App\Models\Guias', 'pedido_id', 'id')->first();
  }

  public function pagos()
  {
    return $this->hasMany(Pagos::class);
  }

  public function usuario()
  {
    return $this->belongsTo(\App\Models\User::class);
  }

  public function productos()
  {
      return $this->belongsToMany(Productos::class, 'pedido_productos', 'pedido_id', 'producto_id')
                  ->withPivot('cantidad', 'precio', 'descuento', 'total')
                  ->withTimestamps();
  }

  protected function getNuevoFolioPedido()
  {
      return Pedido::max('folio') + 1;
  }

  public function scopeInYear($query, $year = null)
  {
      $targetYear = $year ?? Carbon::now()->year;

      // Calcula el inicio y el fin del año objetivo
      $startDate = Carbon::create($targetYear, 1, 1)->startOfDay();
      $endDate = Carbon::create($targetYear, 12, 31)->endOfDay();

      // Filtra los pedidos cuya columna 'fecha' esté dentro del rango del año
      return $query->whereBetween('fecha', [$startDate, $endDate]);
  }

}
