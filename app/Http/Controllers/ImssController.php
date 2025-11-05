<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imss;

class ImssController extends Controller
{
  private $f = 'nexus.imss.';

  /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
       $pagos = Imss::orderBy('fecha', 'desc')->get();
           return view($this->f.'index', compact('pagos'));
     }

     /**
      * Mostrar el formulario para crear un nuevo pago IMSS.
      */
     public function create()
     {
         // Muestra el formulario de creación
         return view($this->f.'create');
     }

     /**
      * Guardar un nuevo pago IMSS en la base de datos.
      */
     public function store(Request $request)
     {
         // Validar la solicitud
         $request->validate([
             'fecha' => 'required|date',
             'periodo' => 'required|string|max:255',
             'bimestre' => 'required|string|max:255',
             'estatus' => 'required|string|max:255',
             'rfc' => 'required|string|max:13',
             'monto' => 'required|numeric',
             'empleados' => 'required|integer',
             'fechadepago' => 'nullable|date',
             //'linkpdf' => 'nullable|url',
         ]);

         // Crear un nuevo registro
         Imss::create($request->all());

         // Redirigir al listado de pagos con un mensaje de éxito
         return redirect()->route('imss.index')->with('success', 'Pago IMSS creado correctamente.');
     }

     /**
      * Mostrar el formulario para editar un pago IMSS específico.
      */
     public function edit($id)
     {
         // Buscar el pago IMSS por su ID
         $pago = Imss::findOrFail($id);
         //dd($pago);

         // Muestra el formulario de edición
         return view($this->f.'edit', compact('pago'));
     }

     /**
      * Actualizar un pago IMSS en la base de datos.
      */
     public function update(Request $request, $id)
     {
         // Validar la solicitud
         $request->validate([
             'fecha' => 'required|date',
             'periodo' => 'required|string|max:255',
             'bimestre' => 'required|string|max:255',
             'estatus' => 'required|string|max:255',
             'rfc' => 'required|string|max:13',
             'monto' => 'required|numeric',
             'empleados' => 'required|integer',
             'fechadepago' => 'nullable|date',
             //'linkpdf' => 'nullable|url',
         ]);

         // Buscar el pago IMSS por su ID y actualizarlo
         $pago = Imss::findOrFail($id);
         $pago->update($request->all());

         // Redirigir al listado de pagos con un mensaje de éxito
         return redirect()->route('imss.index')->with('success', 'Pago IMSS actualizado correctamente.');
     }

     /**
      * Eliminar un pago IMSS de la base de datos.
      */
     public function destroy($id)
     {
         // Buscar el pago IMSS por su ID y eliminarlo
         $pago = Imss::findOrFail($id);
         $pago->delete();

         // Redirigir al listado de pagos con un mensaje de éxito
         return redirect()->route('imss.index')->with('success', 'Pago IMSS eliminado correctamente.');
     }

     /**
      * Revisa si hay pagos de IMSS pendientes para el RFC especificado.
      * * @return int El número de pagos pendientes.
      */
     public static function checkPendingPayments()
    {
       $fechaActual = Carbon::now();
       $añoActual = $fechaActual->year;

       // Especificar el RFC que se va a buscar
       $rfc = 'GOMC631007NC2';
       $pendingPayments = 0;

       // Verificar pagos desde enero hasta el mes anterior al mes actual
       for ($mes = 1; $mes < $fechaActual->month; $mes++) {

           // Determinar la fecha límite para el pago del mes anterior (Se asume día 17 del mes siguiente)
           $fechaLimite = Carbon::create($añoActual, $mes + 1, 17);

           // Si hoy es después o igual al 17 del mes siguiente, y no hay pago registrado, contar como pendiente
           if ($fechaActual->greaterThanOrEqualTo($fechaLimite)) {
               $existePago = Imss::where('rfc', $rfc)
                                 ->whereYear('fecha', $añoActual)
                                 ->where('periodo', $mes)         // El periodo es igual al mes que estamos revisando
                                 ->exists();

               if (!$existePago) {
                   $pendingPayments++;
               }
           }
       }

             return $pendingPayments; // Devuelve el número de pagos pendientes
    }
}
