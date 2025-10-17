<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Isn extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'isn';
  /**
    * The model's default values for attributes.
    *
    * @var array
    */
    protected $fillable = [
      'fecha',
      'periodo',
      'estatus',
      'rfc',
      'monto',
      'empleados',
      'fechadepago',
      'linkpdf'
    ];
}
