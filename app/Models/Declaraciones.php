<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Declaraciones extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'declaraciones';
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
      'fechadepago',
      'linkpdf'
    ];
}
