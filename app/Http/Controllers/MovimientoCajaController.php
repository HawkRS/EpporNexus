<?php

namespace App\Http\Controllers;

use App\Models\MovimientoCaja;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MovimientoCajaController extends Controller
{
  private $f = 'nexus.caja.';

  // Mostrar detalles con los movimientos de los últimos 2 meses
  public function detalle(Request $request)
  {
    $fechaInicio = Carbon::now()->subMonths(2);
    $fechaFin = Carbon::now();
    $balance =0;
    // Filtros personalizados de fechas
    if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
      $fechaInicio = Carbon::parse($request->input('fecha_inicio'));
      $fechaFin = Carbon::parse($request->input('fecha_fin'));
    }

    // Inicializar todas las áreas con valor 0
    $gastosPorArea = [
      'comidas' => 0,
      'casa' => 0,
      'salarios_casa' => 0,
      'salarios_negocio' => 0,
      'gastos_negocio' => 0,
      'gasolinas' => 0,
      'miscelaneos' => 0,
      'prestamo' => 0,
      'ingreso' => 0
    ];

    // Obtener los movimientos en el rango de fechas
    $movimientos = MovimientoCaja::whereBetween('created_at', [$fechaInicio, $fechaFin])
    ->orderBy('created_at', 'desc')
    ->get();

    // Obtener el total gastado por área
    $gastos = MovimientoCaja::select('area', \DB::raw('SUM(monto) as total'))
    ->where('tipo', 'salida')
    ->whereBetween('created_at', [$fechaInicio, $fechaFin])
    ->groupBy('area')
    ->get();

    // Calcular las sumas totales de ingresos y salidas
    $totalIngresos = MovimientoCaja::where('tipo', 'entrada')
    ->whereBetween('created_at', [$fechaInicio, $fechaFin])
    ->sum('monto');

    $totalSalidas = MovimientoCaja::where('tipo', 'salida')
    ->whereBetween('created_at', [$fechaInicio, $fechaFin])
    ->sum('monto');

    // Calcular el balance
    $balance = $totalIngresos - $totalSalidas;

    // Actualizar el arreglo con los valores obtenidos de la base de datos
    foreach ($gastos as $gasto) {
      $gastosPorArea[$gasto->area] = $gasto->total;
    }
    //dd($totalIngresos);
    // Devolver los datos a la vista
    return view($this->f.'index', [
    'movimientos' => $movimientos,
    'gastosPorArea' => $gastosPorArea,
    'totalIngresos' => $totalIngresos,
    'totalSalidas' => $totalSalidas,
    'totalcaja' => $balance,
    'fechaInicio' => $fechaInicio,
    'fechaFin' => $fechaFin,
    ]);
  }
  // Formulario para crear un nuevo movimiento
  public function create()
  {
    return view($this->f.'create');
  }

  // Guardar un nuevo movimiento
  public function store(Request $request)
  {
    $validated = $request->validate([
    'tipo' => 'required|in:entrada,salida',
    'monto' => 'required|numeric',
    'area' => 'nullable|in:comidas,casa,salarios_casa,salarios_negocio,gastos_negocio,gasolinas,miscelaneos,prestamo,ingreso',
    'descripcion' => 'nullable|string|max:255',
    ]);
    //dd($request->all());

    MovimientoCaja::create($validated);

    return redirect()->route('movimientos.index')->with('success', 'Movimiento creado exitosamente');
  }

  // Editar un movimiento
  public function edit($id)
  {
    $movimiento = MovimientoCaja::findOrFail($id);
    return view($this->f.'edit', compact('movimiento'));
  }

  // Actualizar un movimiento
  public function update(Request $request, $id)
  {
    $validated = $request->validate([
    'tipo' => 'required|in:entrada,salida',
    'monto' => 'required|numeric',
    'area' => 'nullable|in:comidas,casa,salarios_casa,salarios_negocio,gastos_negocio,gasolinas,miscelaneos,prestamo,ingreso',
    'descripcion' => 'nullable|string|max:255',
    ]);

    $movimiento = MovimientoCaja::findOrFail($id);
    $movimiento->update($validated);

    return redirect()->route('movimientos.index')->with('success', 'Movimiento actualizado exitosamente');
  }

  // Eliminar un movimiento
  public function destroy($id)
  {
    $movimiento = MovimientoCaja::findOrFail($id);
    $movimiento->delete();

    return redirect()->route('movimientos.index')->with('success', 'Movimiento eliminado exitosamente');
  }
}

