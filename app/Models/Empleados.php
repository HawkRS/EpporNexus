<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'empleados';
  /**
    * The model's default values for attributes.
    *
    * @var array
    */
    protected $fillable = [
      'name',
      'last',
      'birthday',
      'position',
      'salary',
      'gender',
      'address',
      'phone1',
      'phone2',
      'status',
      'nss',
      'curp',
      'rfc',
      'civilstate',
      'departure',
    ];
}
