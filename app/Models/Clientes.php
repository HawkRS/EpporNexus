<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'identificador', 'razonsocial', 'rfc', 'correo', 'telefono', 'direccion',
        'colonia', 'municipio', 'estado', 'pais', 'codigopostal'
    ];

    public function ingresos()
    {
        return $this->hasMany('App\Models\Ingresos');
    }

    public function pedidos()
    {
        return $this->hasMany('App\Models\Pedido', 'cliente_id', 'id')->get();
    }

    /* HELPERS */
    public function saldo($pedidos)
    {
      $saldo = 0;
      foreach ($pedidos as $pedido) {
        $saldo += $pedido->saldo;
      }

      return $saldo;
    }
}
