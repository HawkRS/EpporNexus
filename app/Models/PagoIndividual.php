<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PagoIndividual extends Model
{
    // Nombre de la tabla
    protected $table = 'pago_individuals';

    protected $fillable = [
        'semana_id',
        'empleado_id',
        'trabajo_id', // Opcional
        'dias_pagados',
        'sueldo_base_semanal',
        'extras_bonos_destajo',
        'deducciones',
        'total_neto_pagado', // Se calcula antes de guardar
        'comentarios_empleado'
    ];

    protected $casts = [
        'sueldo_base_semanal' => 'float',
        'extras_bonos_destajo' => 'float',
        'deducciones' => 'float',
        'total_neto_pagado' => 'float',
    ];

    /**
     * RELACIÓN: Pertenece a una semana de pago.
     * @return BelongsTo
     */
    public function semana(): BelongsTo
    {
        return $this->belongsTo(SemanaPago::class, 'semana_id');
    }

    /**
     * RELACIÓN: Pertenece a un empleado. (Asumiendo que tu modelo de empleado se llama Empleado)
     * @return BelongsTo
     */
    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    /**
     * RELACIÓN: Opcionalmente, pertenece a un trabajo de destajo/proyecto.
     * @return BelongsTo
     */
    public function trabajo(): BelongsTo
    {
        return $this->belongsTo(TrabajoProyecto::class, 'trabajo_id');
    }

    /**
     * MUTADOR: Calcula automáticamente el total neto antes de guardar en la DB.
     * (Sueldo Base + Extras) - Deducciones
     * @param float $value
     */
    public function setTotalNetoPagadoAttribute($value): void
    {
        $this->attributes['total_neto_pagado'] =
            $this->sueldo_base_semanal +
            $this->extras_bonos_destajo -
            $this->deducciones;
    }
}
