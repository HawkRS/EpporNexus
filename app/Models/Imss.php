<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imss extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pagoimss';
  /**
    * The model's default values for attributes.
    *
    * @var array
    */
    protected $fillable = [
      'fecha',
      'periodo',
      'bimestre',
      'estatus',
      'rfc',
      'monto',
      'empleados',
      'fechadepago',
      'linkpdf'
    ];
}
