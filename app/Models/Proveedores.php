<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'identificador', 'razonsocial', 'rfc', 'correo', 'telefono', 'direccion',
        'colonia', 'municipio', 'estado', 'pais', 'codigopostal'
    ];

    public function egresos()
    {
        return $this->hasMany('App\Models\Egresos');
    }
}
