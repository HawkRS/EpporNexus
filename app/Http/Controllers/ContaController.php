<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Personas;
use App\Models\Proveedores;
use App\Models\Clientes;
use App\Models\Ingresos;
use App\Models\Egresos;
use Carbon\Carbon;

class ContaController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  private $f = 'nexus.conta.';

  public function meses($mes)
  {
    if ($mes == 1) { return 'Enero'; }
    if ($mes == 2) { return 'Febrero'; }
    if ($mes == 3) { return 'Marzo'; }
    if ($mes == 4) { return 'Abril'; }
    if ($mes == 5) { return 'Mayo'; }
    if ($mes == 6) { return 'Junio'; }
    if ($mes == 7) { return 'Julio'; }
    if ($mes == 8) { return 'Agosto'; }
    if ($mes == 9) { return 'Septiembre'; }
    if ($mes == 10) { return 'Octubre'; }
    if ($mes == 11) { return 'Noviembre'; }
    if ($mes == 12) { return 'Diciembre'; }
  }

  public function bimestre($mes)
  {
    if ($mes == 1 || $mes == 2)   { $bimestre = array('num'=>1, 'name'=>'ENE-FEB', 'balance'=>0, );return $bimestre; }
    if ($mes == 3 || $mes == 4)   { $bimestre = array('num'=>2, 'name'=>'MAR-ABR', 'balance'=>0, );return $bimestre; }
    if ($mes == 5 || $mes == 6)   { $bimestre = array('num'=>3, 'name'=>'MAY-JUN', 'balance'=>0, );return $bimestre; }
    if ($mes == 7 || $mes == 8)   { $bimestre = array('num'=>4, 'name'=>'JUL-AGO', 'balance'=>0, );return $bimestre; }
    if ($mes == 9 || $mes == 10)  { $bimestre = array('num'=>5, 'name'=>'SEP-OCT', 'balance'=>0, );return $bimestre; }
    if ($mes == 11 || $mes ==12 ) { $bimestre = array('num'=>6, 'name'=>'NOV-DIC', 'balance'=>0, );return $bimestre; }
  }

  public function Balances($YearlyIncome, $YearlyOutcome, $month)
  {
    /* BALANCES MENSUALES */
    $ene = array('income' => $YearlyIncome['ene'], 'outcome' => $YearlyOutcome['ene'], 'balance' => ($YearlyIncome['ene'] - $YearlyOutcome['ene']));
    $feb = array('income' => $YearlyIncome['feb'], 'outcome' => $YearlyOutcome['feb'], 'balance' => ($YearlyIncome['feb'] - $YearlyOutcome['feb']));
    $mar = array('income' => $YearlyIncome['mar'], 'outcome' => $YearlyOutcome['mar'], 'balance' => ($YearlyIncome['mar'] - $YearlyOutcome['mar']));
    $abr = array('income' => $YearlyIncome['abr'], 'outcome' => $YearlyOutcome['abr'], 'balance' => ($YearlyIncome['abr'] - $YearlyOutcome['abr']));
    $may = array('income' => $YearlyIncome['may'], 'outcome' => $YearlyOutcome['may'], 'balance' => ($YearlyIncome['may'] - $YearlyOutcome['may']));
    $jun = array('income' => $YearlyIncome['jun'], 'outcome' => $YearlyOutcome['jun'], 'balance' => ($YearlyIncome['jun'] - $YearlyOutcome['jun']));
    $jul = array('income' => $YearlyIncome['jul'], 'outcome' => $YearlyOutcome['jul'], 'balance' => ($YearlyIncome['jul'] - $YearlyOutcome['jul']));
    $ago = array('income' => $YearlyIncome['ago'], 'outcome' => $YearlyOutcome['ago'], 'balance' => ($YearlyIncome['ago'] - $YearlyOutcome['ago']));
    $sep = array('income' => $YearlyIncome['sep'], 'outcome' => $YearlyOutcome['sep'], 'balance' => ($YearlyIncome['sep'] - $YearlyOutcome['sep']));
    $oct = array('income' => $YearlyIncome['oct'], 'outcome' => $YearlyOutcome['oct'], 'balance' => ($YearlyIncome['oct'] - $YearlyOutcome['oct']));
    $nov = array('income' => $YearlyIncome['nov'], 'outcome' => $YearlyOutcome['nov'], 'balance' => ($YearlyIncome['nov'] - $YearlyOutcome['nov']));
    $dic = array('income' => $YearlyIncome['dic'], 'outcome' => $YearlyOutcome['dic'], 'balance' => ($YearlyIncome['dic'] - $YearlyOutcome['dic']));


    $Ventatotal = $YearlyIncome['ene']+$YearlyIncome['feb']+$YearlyIncome['mar']+$YearlyIncome['abr']+$YearlyIncome['may']+$YearlyIncome['jun']+$YearlyIncome['jul']+$YearlyIncome['ago']+$YearlyIncome['sep']+$YearlyIncome['oct']+$YearlyIncome['nov']+$YearlyIncome['dic'];
    $EgresoAnual = $YearlyOutcome['ene']+$YearlyOutcome['feb']+$YearlyOutcome['mar']+$YearlyOutcome['abr']+$YearlyOutcome['may']+$YearlyOutcome['jun']+$YearlyOutcome['jul']+$YearlyOutcome['ago']+$YearlyOutcome['sep']+$YearlyOutcome['oct']+$YearlyOutcome['nov']+$YearlyOutcome['dic'];

    $BalanceAnual = $Ventatotal - $EgresoAnual;
    $TopeAnual = 2000000 - $Ventatotal;

    switch ($month) {
      case 1:
      $Bimestre = $ene['income'] - $ene['outcome'];
      break;
      case 2:
      $Bimestre = $feb['income'] - $feb['outcome'];
      break;
      case 3:
      $Bimestre = $mar['income'] - $mar['outcome'];
      break;
      case 4:
      $Bimestre = $abr['income'] - $abr['outcome'];
      break;
      case 5:
      $Bimestre = $may['income'] - $may['outcome'];
      break;
      case 6:
      $Bimestre = $jun['income'] - $jun['outcome'];
      break;
      case 7:
      $Bimestre = $jul['income'] - $jul['outcome'];
      break;
      case 8:
      $Bimestre = $ago['income'] - $ago['outcome'];
      break;
      case 9:
      $Bimestre = $sep['income'] - $sep['outcome'];
      break;
      case 10:
      $Bimestre = $oct['income'] - $oct['outcome'];
      break;
      case 11:
      $Bimestre = $nov['income'] - $nov['outcome'];
      break;
      case 12:
      $Bimestre = $dic['income'] - $dic['outcome'];
      break;

      default:
      // code...
      break;
    }

    $Balances = array(
    'ene' => $ene, 'feb' => $feb, 'mar' => $mar,
    'abr' => $abr, 'may' => $may, 'jun' => $jun,
    'jul' => $jul, 'ago' => $ago, 'sep' => $sep,
    'oct' => $oct, 'nov' => $nov, 'dic' => $dic,
    'topeanual' => $TopeAnual, 'ingresoanual' => $Ventatotal, 'egresoanual' => $EgresoAnual,  'balanceanual' => $BalanceAnual,
    'mesactual' => $Bimestre
    );
    return $Balances;
  }

  public function show($rfc, $year)
  {
    $fecha = Carbon::now('America/Mexico_City');
    $bimestre = $this->bimestre($fecha->month);
    $mes = $this->meses($fecha->month);
    //dd($bimestre);
    /* INGRESOS */
    $IngresoHelper = new Ingresos;
    $YearlyIncome = $IngresoHelper->YearlyIncome($rfc, $year);
    /* EGRESOS */
    $EgresoHelper = new Egresos;
    $YearlyOutcome = $EgresoHelper->YearlyOutcome($rfc, $year);

    $Balances = $this->Balances($YearlyIncome, $YearlyOutcome, $fecha->month);
    //dd($YearlyIncome);

    return view($this->f.'show', [
    'rfc' => $rfc,'year' => $year,
    'mesactual' => $mes,
    'balances' => $Balances,
    'YearlyIncome' => $YearlyIncome,
    'YearlyOutcome' => $YearlyOutcome,
    ]);
    //dd('hola');
    $ProveeList = Personas::where('tipo','1')->orwhere('tipo','3')->get();
    //dd($ProveeList);
    return view($this->f.'index', [
    'clientes' => $ProveeList,
    ]);
  }

  public function years($rfc)
  {
    return 'hola';
  }

  public function detail($rfc, $year, $month)
  {
    /* HELPERS */
    $mes = $this->meses($month);
    $date = $year . "-" . $month . "-01";
    $fecha = Carbon::parse($date);
    $fechafin = $year . "-" . $month . "-" . $fecha->daysInMonth;

    // Listas de proveedores y clientes
    $ProveeList = Proveedores::orderBy('identificador', 'asc')->get();
    $ClientList = Clientes::orderBy('identificador', 'asc')->get();

    /* INGRESOS */
    $IngHelper = new Ingresos;
    $IngresosMensual = $IngHelper->IngresoMensual($rfc, $year, $month);
    $IngresoList = Ingresos::where('rfc', $rfc)->whereBetween('fecha', [$date, $fechafin])->get();

    /* EGRESOS */
    $EngHelper = new Egresos;
    $EgresosMensual = $EngHelper->EgresosMensuales($rfc, $year, $month);
    $EgresoList = Egresos::where('rfc', $rfc)->whereBetween('fecha', [$date, $fechafin])->get();

    /* BALANCE */
    $BalanceIva = $EgresosMensual['ivaacreeditable'] - $IngresosMensual['ivatrasladado'];
    $BalanceMensual = [
    'ingresos' => $IngresosMensual['total'],
    'egresos' => $EgresosMensual['total'],
    'balance' => $IngresosMensual['total'] - $EgresosMensual['total'],
    'diffivas' => $EgresosMensual['ivaacreeditable'] - $IngresosMensual['ivatrasladado']
    ];

    return view($this->f . 'detail', [
    'rfc' => $rfc,
    'year' => $year,
    'monthname' => $mes,
    'month' => $month,
    'proveedores' => $ProveeList,
    'clientes' => $ClientList,
    'ingresos' => $IngresoList,
    'egresos' => $EgresoList,
    'balance' => $BalanceMensual,
    'ingresomensual' => $IngresosMensual,
    'egresomensual' => $EgresosMensual,
    ]);
  }


  public function addingreso($rfc, Request $request)
  {
    $messages = [
    'required' => 'El campo :attribute es obligatorio.',
    'numeric' => 'El campo :attribute debe ser un número.',
    'exists' => 'El cliente seleccionado no es válido.',
    'date' => 'El formato de fecha es inválido.',
    'unique' => 'El folio de ingreso ya existe.',
    ];

    // *** Solución al error: usar $request->validate() ***
    $request->validate([
    'ing_fecha' => ['required', 'date'],
    'ing_client' => ['required', 'numeric', 'exists:clientes,id'],
    'ing_total' => ['required', 'numeric'],
    'ing_folio' => ['nullable', 'unique:ingresos,folio'],
    ], $messages);

    $fecha = Carbon::parse($request->ing_fecha);

    $total = $request->ing_total;
    $ingPub = (int)$request->ing_pub;

    $NewIngreso = new Ingresos;
    $NewIngreso->fecha = $request->ing_fecha;
    $NewIngreso->clientes_id = $request->ing_client;
    $NewIngreso->folio = $request->ing_folio;
    $NewIngreso->rfc = $rfc;
    $NewIngreso->estatus = $request->ing_status;
    $NewIngreso->total = $total;

    if ($ingPub === 0) {
      $NewIngreso->subtotal = round(($total / 1.16), 2);
      $NewIngreso->iva = round(($NewIngreso->subtotal * 0.16), 2);
    } else {
      $NewIngreso->subtotal = $total;
      $NewIngreso->iva = 0;
    }

    $NewIngreso->save();

    return redirect()->route('conta.detail', [
    'rfc' => $rfc,
    'year' => $fecha->year,
    'month' => $fecha->month
    ]);
  }

  /**
  * Agrega un nuevo registro de Egreso.
  * Usando $request->validate() para la validación moderna en Laravel 11.
  */
  public function addegreso($rfc, Request $request)
  {
    $messages = [
    'required' => 'El campo :attribute es obligatorio.',
    'numeric' => 'El campo :attribute debe ser un número.',
    'exists' => 'El proveedor seleccionado no es válido.',
    'date' => 'El formato de fecha es inválido.',
    'unique' => 'El folio de egreso ya existe.',
    ];

    // *** Solución al error: usar $request->validate() ***
    $request->validate([
    'egr_fecha' => ['required', 'date'],
    'egr_provee' => ['required', 'numeric', 'exists:proveedores,id'],
    'egr_total' => ['required', 'numeric'],
    'egr_folio' => ['nullable', 'unique:egresos,folio'],
    ], $messages);

    $fecha = Carbon::parse($request->egr_fecha);

    $NewEgreso = new Egresos;
    $NewEgreso->fecha = $request->egr_fecha;
    $NewEgreso->proveedores_id = $request->egr_provee;
    $NewEgreso->folio = $request->egr_folio;
    $NewEgreso->rfc = $rfc;
    $NewEgreso->estatus = $request->egr_status;
    $NewEgreso->total = $request->egr_total;

    if (isset($request->egr_subtotal)) {
      $NewEgreso->subtotal = $request->egr_subtotal;
    } else {
      $NewEgreso->subtotal = round((($request->egr_total) / 1.16), 2);
    }

    if (isset($request->egr_iva)) {
      $NewEgreso->iva = $request->egr_iva;
    } else {
      $NewEgreso->iva = round(($NewEgreso->subtotal * 0.16), 2);
    }

    $NewEgreso->save();

    return redirect()->route('conta.detail', [
    'rfc' => $rfc,
    'year' => $fecha->year,
    'month' => $fecha->month
    ]);
  }

  public function editegreso($rfc, $id)
  {
    $Egreso = Egresos::findOrFail($id);
    $ProveeList = Proveedores::orderBy('identificador', 'asc')->get();

    return view($this->f . 'egresoedit', [
    'egreso' => $Egreso,
    'rfc' => $rfc,
    'proveedores' => $ProveeList,
    ]);
  }

  /**
  * Actualiza un registro de Egreso específico.
  * @param string $rfc RFC del contribuyente
  * @param int $id ID del Egreso a actualizar
  */
  public function updateegreso($rfc, $id, Request $request)
  {
    // 1. Obtener el registro a actualizar
    $UpdatedEgreso = Egresos::findorfail($id);

    $messages = [
    'required' => 'El campo :attribute es obligatorio.',
    'numeric' => 'El campo :attribute debe ser un número.',
    'exists' => 'El proveedor seleccionado no es válido.',
    'date' => 'El formato de fecha es inválido.',
    ];

    // 2. Validación moderna ($request->validate)
    $request->validate([
    'egr_fecha' => ['required', 'date'],
    'egr_provee' => ['required', 'numeric', 'exists:proveedores,id'],
    'egr_total' => ['required', 'numeric'],
    'egr_status' => ['required', 'numeric'],
    // 'egr_gas' se mantiene si es necesario, aunque no se usa en el update del modelo
    'egr_gas' => ['required', 'numeric'],
    // Regla para asegurar que el folio sea único, pero ignorando el registro actual
    'egr_folio' => [
    'nullable',
    Rule::unique('egresos', 'folio')->ignore($UpdatedEgreso->id),
    ],
    ], $messages);

    // 3. Actualización de datos
    $UpdatedEgreso->fecha = $request->egr_fecha;
    $UpdatedEgreso->proveedores_id = $request->egr_provee;
    $UpdatedEgreso->folio = $request->egr_folio;
    $UpdatedEgreso->estatus = $request->egr_status;

    // Lógica de Subtotal e IVA
    $total = $request->egr_total;

    if (isset($request->egr_subtotal)) {
      $UpdatedEgreso->subtotal = $request->egr_subtotal;
    } else {
      $UpdatedEgreso->subtotal = round(($total / 1.16), 2);
    }

    if (isset($request->egr_iva)) {
      $UpdatedEgreso->iva = $request->egr_iva;
    } else {
      $UpdatedEgreso->iva = round(($UpdatedEgreso->subtotal * 0.16), 2);
    }

    $UpdatedEgreso->total = $total;

    $UpdatedEgreso->save();

    // 4. Redirección
    $fecha = Carbon::parse($UpdatedEgreso->fecha); // Usamos la fecha del objeto actualizado
    return redirect()->route('conta.detail', [
    'rfc' => $rfc,
    'year' => $fecha->year,
    'month' => $fecha->month
    ]);
  }

  public function editingreso($rfc, $id)
  {
    $Ingreso = Ingresos::findOrFail($id);
    $ClientList = Clientes::orderBy('identificador', 'asc')->get();

    return view($this->f . 'ingresoedit', [
    'ingreso' => $Ingreso,
    'rfc' => $rfc,
    'clientes' => $ClientList,
    ]);
  }


  /**
  * Actualiza un registro de Ingreso específico.
  * @param string $rfc RFC del contribuyente
  * @param int $id ID del Ingreso a actualizar
  */
  public function updateingreso($rfc, $id, Request $request)
  {
    // 1. Obtener el registro a actualizar
    $UpdatedIngreso = Ingresos::findorfail($id);

    $messages = [
    'required' => 'El campo :attribute es obligatorio.',
    'numeric' => 'El campo :attribute debe ser un número.',
    'exists' => 'El cliente seleccionado no es válido.',
    'date' => 'El formato de fecha es inválido.',
    ];

    // 2. Validación moderna ($request->validate)
    $request->validate([
    'ing_fecha' => ['required', 'date'],
    'ing_client' => ['required', 'numeric', 'exists:clientes,id'],
    'ing_total' => ['required', 'numeric'],
    // Regla para asegurar que el folio sea único, pero ignorando el registro actual
    'ing_folio' => [
    'nullable',
    Rule::unique('ingresos', 'folio')->ignore($UpdatedIngreso->id),
    ],
    ], $messages);

    // La fecha original (o la nueva si se actualiza) es necesaria para la redirección
    // Se obtiene el objeto Carbon DESPUÉS de findorfail.

    // 3. Actualización de datos
    $ingPub = (int)$request->ing_pub;

    $UpdatedIngreso->fecha = $request->ing_fecha;
    $UpdatedIngreso->clientes_id = $request->ing_client;
    $UpdatedIngreso->folio = $request->ing_folio;
    $UpdatedIngreso->rfc = $rfc;
    $UpdatedIngreso->estatus = $request->ing_status;
    // Asumiendo que 'test' es una columna de tu modelo usada para ing_pub
    $UpdatedIngreso->test = $ingPub;
    $UpdatedIngreso->total = $request->ing_total;

    $total = $request->ing_total;

    // Lógica de Subtotal
    if ($ingPub === 0) {
      $UpdatedIngreso->subtotal = round(($total / 1.16), 2);
    } else {
      $UpdatedIngreso->subtotal = $total;
    }

    // Lógica de IVA
    if ($ingPub === 0) {
      $UpdatedIngreso->iva = round(($UpdatedIngreso->subtotal * 0.16), 2);
    } else {
      $UpdatedIngreso->iva = 0;
    }

    $UpdatedIngreso->save();

    // 4. Redirección
    $fecha = Carbon::parse($UpdatedIngreso->fecha);
    return redirect()->route('conta.detail', [
    'rfc' => $rfc,
    'year' => $fecha->year,
    'month' => $fecha->month
    ]);
  }

}

