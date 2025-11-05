<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SemanaPago extends Model
{
    // Nombre de la tabla
    protected $table = 'semana_pagos';

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'comentarios_semana',
        'total_pagado'
    ];

    // Casteo para asegurar que las fechas sean objetos Carbon y el total sea flotante
    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'total_pagado' => 'float',
    ];

    /**
     * RELACIÓN: Una semana de pago tiene muchos pagos individuales.
     * @return HasMany
     */
    public function pagos(): HasMany
    {
        return $this->hasMany(PagoIndividual::class, 'semana_id');
    }

    /**
     * FUNCIÓN: Actualiza el campo 'total_pagado' sumando todos los pagos individuales de la semana.
     */
    public function actualizarTotalPagado(): void
    {
        // Suma el campo 'total_neto_pagado' de todos los pagos asociados
        $this->total_pagado = $this->pagos()->sum('total_neto_pagado');
        $this->save();
    }
}
