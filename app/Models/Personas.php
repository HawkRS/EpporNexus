<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'personas';

    /**
      * The model's default values for attributes.
      *
      * @var array
      */
    protected $fillable = [
      'identificador',
      'razonsocial',
      'rfc',
      'tipo',
      'correo',
      'telefono',
      'direccion',
      'colonia',
      'municipio',
      'estado',
      'pais',
      'codigopostal',
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
