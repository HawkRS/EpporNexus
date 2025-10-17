<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Tareas extends Model
{
  use SoftDeletes;
  protected $dates = ['created_at', 'updated_at','fechalimite'];
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tareas';
  /**
    * The model's default values for attributes.
    *
    * @var array
    */
  protected $fillable = [
      'personas_id',
      'tarea',
      'estatus',
      'fechalimite',
      'importancia',
      'asignadoa',
      'departamento',
    ];

    public function Creador()
    {
      $cliente = $this->hasOne('App\User', 'id', 'users_id')->first();
      //dd($cliente);
      if ($cliente != null) {
        $client = $cliente->name.' '.$cliente->last;
      }
      else {
        $client = 'Por asignar';
      }
      return $client;
    }

    public function Asignado()
    {
      $cliente = $this->hasOne('App\User', 'id', 'asignadoa')->first();
      //dd($cliente);
      if ($cliente != null) {
        $client = $cliente->name.' '.$cliente->last;
      }
      else {
        $client = 'SIN ASIGNACIÓN';
      }
      return $client;
    }

}
