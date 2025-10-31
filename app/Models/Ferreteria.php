<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ferreteria extends Model
{
  use HasFactory, SoftDeletes;

  // Nombre de la tabla
  protected $table = 'ferreteria';

  // Asumiendo que 'id' es la clave primaria por convención de Laravel
  protected $primaryKey = 'id'; 

  // Campos que pueden ser asignados masivamente (Mass Assignable)
  protected $fillable = [
      'codigo',
      'nombre',
      'categoria',
      'cantidad',
      'costo_unitario',
      'unidad_medida',
      'precio_venta',
  ];

  // Casteo de tipos para asegurar que los números sean tratados como tal
  protected $casts = [
      'cantidad' => 'integer',
      'costo_unitario' => 'decimal:4',
      'precio_venta' => 'decimal:2',
  ];
}
