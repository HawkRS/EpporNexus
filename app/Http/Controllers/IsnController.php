<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Isn ;
use Carbon\Carbon;

class IsnController extends Controller
{

    private $f = 'nexus.isn.';
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pagos = Isn::orderBy('fecha', 'desc')->get();
          return view($this->f.'index', compact('pagos'));
    }

    /**
  * Mostrar el formulario para crear un nuevo pago ISN(2%).
  */
  public function create()
  {
    // Muestra el formulario de creación
    return view($this->f.'create');
  }

  /**
  * Guardar un nuevo pago ISN(2%) en la base de datos.
  */
  public function store(Request $request)
  {
    // Validar la solicitud
    $request->validate([
        'fecha' => 'required|date',
        'periodo' => 'required|string|max:255',
        'estatus' => 'required|string|max:255',
        'rfc' => 'required|string|max:13',
        'monto' => 'required|numeric',
        'empleados' => 'required|integer',
        'fechadepago' => 'nullable|date',
        //'linkpdf' => 'nullable|url',
    ]);

    // Crear un nuevo registro
    Isn::create($request->all());

    // Redirigir al listado de pagos con un mensaje de éxito
    return redirect()->route('isn.index')->with('success', 'Pago ISN(2%) creado correctamente.');
  }

  /**
  * Mostrar el formulario para editar un pago ISN(2%) específico.
  */
  public function edit($id)
  {
    // Buscar el pago ISN(2%) por su ID
    $pago = Isn::findOrFail($id);
    //dd($pago);

    // Muestra el formulario de edición
    return view($this->f.'edit', compact('pago'));
  }

  /**
  * Actualizar un pago ISN(2%) en la base de datos.
  */
  public function update(Request $request, $id)
  {
    // Validar la solicitud
    $request->validate([
        'fecha' => 'required|date',
        'periodo' => 'required|string|max:255',
        'estatus' => 'required|string|max:255',
        'rfc' => 'required|string|max:13',
        'monto' => 'required|numeric',
        'empleados' => 'required|integer',
        'fechadepago' => 'nullable|date',
        //'linkpdf' => 'nullable|url',
    ]);

    // Buscar el pago ISN(2%) por su ID y actualizarlo
    $pago = Isn::findOrFail($id);
    $pago->update($request->all());

    // Redirigir al listado de pagos con un mensaje de éxito
    return redirect()->route('isn.index')->with('success', 'Pago ISN(2%) actualizado correctamente.');
  }

  /**
  * Eliminar un pago ISN(2%) de la base de datos.
  */
  public function destroy($id)
  {
    // Buscar el pago ISN(2%) por su ID y eliminarlo
    $pago = Isn::findOrFail($id);
    $pago->delete();

    // Redirigir al listado de pagos con un mensaje de éxito
    return redirect()->route('isn.index')->with('success', 'Pago ISN(2%) eliminado correctamente.');
  }

    public static function checkPendingPayments()
    {
      $fechaActual = Carbon::now();
      $añoActual = $fechaActual->year;

      // Especificar el RFC que se va a buscar
      $rfc = 'GOMC631007NC2';
      $pendingIsns = 0;

      // Verificar pagos desde enero hasta el mes anterior al mes actual
      for ($mes = 1; $mes < $fechaActual->month; $mes++) {

        // Determinar la fecha límite para el pago del mes anterior
        $fechaLimite = Carbon::create($añoActual, $mes + 1, 17);

        // Si hoy es después del 17 del mes siguiente, y no hay pago registrado, contar como pendiente
        if ($fechaActual->greaterThanOrEqualTo($fechaLimite)) {
          $existePago = Isn::where('rfc', $rfc)
          ->whereYear('fecha', $añoActual)
          ->where('periodo', $mes)         // El periodo es igual al mes que estamos revisando
          ->exists();
          // Para Declaraciones
          if (!$existePago) {
            //echo('RFC: '.$rfc.' | Año: '.$añoActual.' | Periodo: '.$mes.' | Res: '.$existePago);
            $pendingIsns++;
          }
        }
      }
      //dd($pendingIsns);
      return $pendingIsns; // Devuelve el número de pagos pendientes
    }
}
