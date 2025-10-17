<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Productos extends Model
{
    use SoftDeletes;
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'productos';

    /**
      * The model's default values for attributes.
      *
      * @var array
      */
    protected $fillable = [
      'codigo',
      'nombre',
      'existencia',
      'descripcion',
      'categoria',
      'img',
      'costo',
      'ganancia',
      'ancho',
      'alto',
      'largo',
      'peso',
    ];

    /* RELACIONES */
    public function egresos() {
      //dd('hola');
      return $this->hasMany('App\Models\Egresos')->get();
    }
    public function ingresos() {
      //dd('hola');
      return $this->hasMany('App\Models\Ingresos')->get();
    }
}
