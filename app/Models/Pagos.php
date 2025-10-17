<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'pedido_id',
        'fecha',
        'metodo',
        'banco',
        'monto',
    ];

    /**
     * Relación con Pedido.
     */
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    /**
     * Agregar un nuevo pago y actualizar saldo del pedido.
     */
    public static function agregarPago($data)
    {
        $pago = self::create($data);
        $pago->actualizarSaldoPedido(-$pago->monto); // Reducir saldo
        return $pago;
    }

    /**
     * Editar un pago existente y ajustar el saldo del pedido.
     */
    public function editarPago($data, $id)
    {
        //dd($data);
        $pago= Pagos::findOrFail($id);
        $montoAnterior = $pago->monto;
        $pago->update($data);
        $diferencia = $montoAnterior - $pago->monto;
        $this->actualizarSaldoPedido($diferencia); // Ajustar saldo
    }

    /**
     * Eliminar un pago y restaurar saldo del pedido.
     */
    public function eliminarPago($pagoid)
    {
        //dd($pagoid);
        $pago= Pagos::findOrFail($pagoid);
        $pago->actualizarSaldoPedido($pago->monto); // Reintegrar saldo
        $pago->delete();
    }

    /**
     * Actualizar saldo del pedido.
     */
    protected function actualizarSaldoPedido($monto)
    {
        $pedido = $this->pedido;
        if ($pedido) {
            $pedido->saldo += $monto;
            $pedido->save();
        }
    }
}
