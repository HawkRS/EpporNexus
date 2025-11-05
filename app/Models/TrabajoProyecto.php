<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrabajoProyecto extends Model
{
    // Nombre de la tabla
    protected $table = 'trabajo_proyectos';

    protected $fillable = [
        'nombre',
        'tipo', // 'destajo' o 'proyecto_monto_fijo'
        'valor_total_proyecto',
        'estado' // 'activo', 'finalizado', 'cancelado'
    ];

    protected $casts = [
        'valor_total_proyecto' => 'float',
    ];

    /**
     * RELACIÓN: Un trabajo puede tener múltiples pagos individuales (abonos).
     * @return HasMany
     */
    public function pagos(): HasMany
    {
        return $this->hasMany(PagoIndividual::class, 'trabajo_id');
    }

    /**
     * ACCESOR: Calcula el monto total pagado acumulado por este trabajo.
     * Esto incluye el sueldo base y los extras pagados que estén ligados a este trabajo.
     * * @return float
     */
    public function getPagadoAcumuladoAttribute(): float
    {
        // Se suman tanto el sueldo base como los extras que se pagaron en los registros individuales
        return $this->pagos()->sum('sueldo_base_semanal') +
               $this->pagos()->sum('extras_bonos_destajo');
    }

    /**
     * ACCESOR: Calcula el remanente (el extra) que queda por pagar.
     * Esto responde a: "cuánto es el extra que se van a repartir".
     * * @return float
     */
    public function getRemanentePorPagarAttribute(): float
    {
        return $this->valor_total_proyecto - $this->pagado_acumulado;
    }
}
