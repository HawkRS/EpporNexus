<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Guias extends Model
{
  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'guias';
  use SoftDeletes;

  /**
  * The attributes that should be mutated to dates.
  *
  * @var array
  */
  protected $dates = ['deleted_at'];

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'guia', 'paqueteria','pedido_id'
  ];

  public function pedido() {
  //dd('hola');
      return $this->belongsTo(Pedidos::class);
  }


  /* HELPERS */
public function AddGuia($pedido, $data)
{
  //dd($reparacion);
  $newGuia = new Guias;
  $newGuia->guia = $data->guia;
  $newGuia->paqueteria = $data->paqueteria;
  $newGuia->pedido_id = $pedido->id;
  $newGuia->save();
}
}
