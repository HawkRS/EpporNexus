<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagos;

class PagosController extends Controller
{
  /**
       * Almacenar un nuevo pago.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\RedirectResponse
       */
      public function store(Request $request)
      {
          // 1. Validar los datos de entrada
          $data = $request->validate([
              'pedido_id' => 'required|exists:pedidos,id',
              'fecha' => 'required|date',
              'metodo' => 'required|string',
              'banco' => 'nullable|string',
              'monto' => 'required|numeric|min:0',
          ]);
          // 2. Ejecutar la lógica de negocio a través del método estático del modelo
          Pagos::agregarPago($data);
          // 3. Redireccionar con mensaje de éxito
          return redirect()->route('pedidos.show', ['id' => $request->pedido_id])
                           ->with('success', 'Pago agregado correctamente.');
      }



      /**
       * Actualizar un pago existente.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id El ID del pago a actualizar (inyectado desde la URL).
       * @return \Illuminate\Http\RedirectResponse
       */
      public function update(Request $request, $id)
      {
          // 1. Encontrar el pago o fallar (404)
          $pago = Pagos::findOrFail($id);
          // 2. Validar los datos de entrada
          $data = $request->validate([
              'fecha' => 'required|date',
              'metodo' => 'required|string',
              'banco' => 'nullable|string',
              'monto' => 'required|numeric|min:0',
          ]);
          // 3. Ejecutar la lógica de negocio a través del método de instancia del modelo
          // Se asume que editarPago usa el ID para la lógica interna o simplemente usa $pago->update($data)
          $pago->editarPago($data, $id);
          // 4. Redireccionar con mensaje de éxito
          return redirect()->route('pedidos.show', ['id' => $pago->pedido_id])
                           ->with('success', 'Pago actualizado correctamente.');
      }


      /**
       * Eliminar un pago.
       *
       * Nota: Se ha cambiado el nombre de la función de 'delete' a 'destroy' para seguir la convención de rutas resource de Laravel.
       *
       * @param  int  $id El ID del pago a eliminar.
       * @return \Illuminate\Http\RedirectResponse
       */
      public function destroy($id)
      {
          // 1. Encontrar el pago o fallar (404)
          $pago = Pagos::findOrFail($id);
          // 2. Ejecutar la lógica de negocio para la eliminación
          $pago->eliminarPago($id);
          // 3. Redireccionar con mensaje de éxito
          return redirect()->route('pedidos.show', ['id' => $pago->pedido_id])
                           ->with('success', 'Pago eliminado correctamente.');
      }
}
