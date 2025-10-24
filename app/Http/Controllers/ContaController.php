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
        ];

        $this->validate(request(), [
          'ing_fecha' => 'required|date',
          'ing_client' => 'required|numeric|exists:clientes,id', // Cambiado a clientes
          'ing_total' => 'required|numeric',
          'ing_folio' => 'nullable|unique:ingresos,folio',
        ], $messages);

        $fecha = Carbon::parse($request->ing_fecha);

        $NewIngreso = new Ingresos;
        $NewIngreso->fecha = $request->ing_fecha;
        $NewIngreso->clientes_id = $request->ing_client; // Cambiado a clientes_id
        $NewIngreso->folio = $request->ing_folio;
        $NewIngreso->rfc = $rfc;
        $NewIngreso->estatus = $request->ing_status;
        $NewIngreso->total = $request->ing_total;
        $NewIngreso->subtotal = ($request->ing_pub == 0) ? round(($request->ing_total / 1.16), 2) : $request->ing_total;
        $NewIngreso->iva = ($request->ing_pub == 0) ? round(($NewIngreso->subtotal * 0.16), 2) : 0;

        $NewIngreso->save();

        return redirect()->route('conta.detail', ['rfc' => $rfc, 'year' => $fecha->year, 'month' => $fecha->month]);
      }

      public function addegreso($rfc, Request $request)
          {
            //dd($request->all());
            $messages = [
            'required' => 'El campo :attribute es obligatorio.',
            'numeric' => 'El campo :attribute debe ser un numero.',
            'min' => 'Debes elegir una opcion en el campo :attribute.',
            'max' => 'El campo :attribute esta fuera de rango.',
            'date' => 'Formato o fecha invalido, el formato correcto es dd/mm/aaaa',
            ];
            $this->validate(request(), [
              'egr_fecha' => 'required|date',
              'egr_provee' => 'required|numeric|exists:proveedores,id',
              'egr_total' => 'required|numeric',
              'egr_folio' => 'nullable|unique:egresos,folio',
             ], $messages);
             $fecha = Carbon::parse($request->egr_fecha);
            //dd($fecha->year);
            $NewEgreso = new Egresos;
            $NewEgreso->fecha = $request->egr_fecha;
            $NewEgreso->proveedores_id = $request->egr_provee;
            $NewEgreso->folio = $request->egr_folio;
            $NewEgreso->rfc = $rfc;
            $NewEgreso->estatus = $request->egr_status;
            if (isset($request->egr_subtotal)) {$NewEgreso->subtotal = $request->egr_subtotal;  } else { $NewEgreso->subtotal = round((($request->egr_total)/1.16),2); }
            if (isset($request->egr_iva)) {$NewEgreso->iva = $request->egr_iva;  } else { $NewEgreso->iva = round(($NewEgreso->subtotal*0.16),2); }
            $NewEgreso->total = $request->egr_total;
            //dd($NewEgreso);
            $NewEgreso->save();

            $year = $fecha->year;
            $month = $fecha->month;
            return redirect()->route('conta.detail', ['rfc' => $rfc, 'year' => $year, 'month' => $month]);
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

      public function updateegreso($rfc, $id, Request $request)
      {
        $UpdatedEgreso = Egresos::findorfail($id);
        $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'numeric' => 'El campo :attribute debe ser un numero.',
        'min' => 'Debes elegir una opcion en el campo :attribute.',
        'max' => 'El campo :attribute esta fuera de rango.',
        'date' => 'Formato o fecha invalido, el formato correcto es dd/mm/aaaa',
        ];
        $this->validate(request(), [
          'egr_fecha' => 'required|date',
          'egr_provee' => 'required|numeric|exists:proveedores,id',
          'egr_total' => 'required|numeric',
          'egr_status' => 'required|numeric',
          'egr_gas' => 'required|numeric',
          'egr_folio' => 'nullable',Rule::unique('egresos')->ignore($request->folio, 'folio'),
         ], $messages);
         //dd($request->all());
         $UpdatedEgreso->fecha = $request->egr_fecha;
         $UpdatedEgreso->proveedores_id = $request->egr_provee;
         $UpdatedEgreso->folio = $request->egr_folio;
         $UpdatedEgreso->estatus = $request->egr_status;
         if (isset($request->egr_subtotal)) {$UpdatedEgreso->subtotal = $request->egr_subtotal;  } else { $UpdatedEgreso->subtotal = round((($request->egr_total)/1.16),2); }
         if (isset($request->egr_iva)) {$UpdatedEgreso->iva = $request->egr_iva;  } else { $UpdatedEgreso->iva = round(($UpdatedEgreso->subtotal*0.16),2); }
         $UpdatedEgreso->total = $request->egr_total;
         $fecha = $UpdatedEgreso->fecha;
         //dd($fecha);
         $UpdatedEgreso->save();

         return redirect()->route('conta.detail', ['rfc' => $rfc, 'year' => $fecha->year, 'month' => $fecha->month]);
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


      public function updateingreso($rfc, $id, Request $request)
      {
        $UpdatedIngreso = Ingresos::findorfail($id);
        $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'numeric' => 'El campo :attribute debe ser un numero.',
        'min' => 'Debes elegir una opcion en el campo :attribute.',
        'max' => 'El campo :attribute esta fuera de rango.',
        'date' => 'Formato o fecha invalido, el formato correcto es dd/mm/aaaa',
        ];
        $this->validate(request(), [
          'ing_fecha' => 'required|date',
          'ing_client' => 'required|numeric|exists:clientes,id',
          'ing_total' => 'required|numeric',
          'ing_folio' => 'nullable',Rule::unique('ingresos')->ignore($request->folio, 'folio'),
         ], $messages);
         $fecha = Carbon::parse($UpdatedIngreso->fecha);

         $UpdatedIngreso->fecha = $request->ing_fecha;
         $UpdatedIngreso->clientes_id = $request->ing_client;
         $UpdatedIngreso->folio = $request->ing_folio;
         $UpdatedIngreso->rfc = $rfc;
         $UpdatedIngreso->estatus = $request->ing_status;
         $UpdatedIngreso->test = $request->ing_pub;
         $UpdatedIngreso->total = $request->ing_total;
         //dd($request->ing_pub);
         if ($request->ing_pub == 0) {
           $UpdatedIngreso->subtotal = round(($request->ing_total/1.16),2);
         }
           else {
             $UpdatedIngreso->subtotal = $request->ing_total;
           }
         if ($request->ing_pub == 0) {
           $UpdatedIngreso->iva = round(($UpdatedIngreso->subtotal*0.16),2);
           //dd($UpdatedIngreso);
         }
           else {
             $UpdatedIngreso->iva = 0;
           }
         //dd($UpdatedIngreso);

         $UpdatedIngreso->save();

         return redirect()->route('conta.detail', ['rfc' => $rfc, 'year' => $fecha->year, 'month' => $fecha->month]);
       }

}
