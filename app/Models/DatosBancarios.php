<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatosBancarios extends Model
{
  use SoftDeletes;
  protected $table = 'datosbancarios';
  protected $fillable = [
    'titular',
    'clabe',
    'cuenta',
    'sucursal',
    'tarjeta',
    'banco'
  ];



}
