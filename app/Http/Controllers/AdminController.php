<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MovimientoCaja;
use App\Models\Personas;
use App\Models\Ingresos;
use App\Models\Egresos;
use App\Models\Pedido;
use App\Models\Tareas;
use App\Models\Imss;
use Carbon\Carbon;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  private $f = 'nexus.';

  public function __construct()
  {
      //$this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
   public function index()
   {
     $fecha = Carbon::now('America/Mexico_City');

     /* TOPES ANUALES */
     $Contables = array('HEGS650524ST3','GOHC9010197I0','GOMC631007NC2');
     $TopesAnuales = array();
     $VentasAnuales = array('ene'=>0,'feb'=>0,'mar'=>0,'abr'=>0,'may'=>0,'jun'=>0,'jul'=>0,'ago'=>0,'sep'=>0,'oct'=>0,'nov'=>0,'dic'=>0);
     $IngresoAnual = new Ingresos;
     $EgresoAnual = new Egresos;

     foreach ($Contables as $key => $Contable) {
       $YearIncome = $IngresoAnual->YearIncome($Contable, $fecha->year);
       $YearOutcome = $EgresoAnual->YearOutcome($Contable, $fecha->year);
       $YearlyIncome = $IngresoAnual->YearlyIncome($Contable, $fecha->year);
       foreach ($YearlyIncome as $mes => $venta) {
         $VentasAnuales[$mes] += $venta;
       }
       array_push($TopesAnuales, $YearIncome);
     }

     // Movimientos y balance de caja
     $movimientos = MovimientoCaja::orderBy('created_at', 'desc')->take(10)->get();
     $balance = MovimientoCaja::sum(
       \DB::raw("CASE WHEN tipo = 'entrada' THEN monto ELSE -monto END")
     );

     // Últimos pedidos
     $pedidos = Pedido::orderBy('id', 'desc')->get();
     $ultimospedidos = Pedido::orderBy('id', 'desc')->take(10)->get();

     // Cantidad de pedidos activos
     $pedidosActivos = Pedido::whereNotIn('estado', ['cancelado', 'entregado'])->count();

     // Total de saldo por cobrar (de todos los pedidos existentes)
     $totalSaldoPedidos = Pedido::sum('saldo');
     $totalCobradoPedidos = Pedido::sum('total')-Pedido::sum('saldo');
     $ImssPayments=0;
     $IsnPayments=0;
     $SatPayments=0;
     $currentYear = Carbon::now()->year;
     $lastYear = $currentYear - 1;
     $totalVentasLastYear = Pedido::inYear($lastYear)->sum('total');
     $queryCurrentYear = Pedido::inYear($currentYear);
     $totalVentasCurrentYear = $queryCurrentYear
         ->whereDate('fecha', '<=', Carbon::today())
         ->sum('total');
     $fechaHaceUnAnio = $fecha->copy()->subYear();
     $productosUltimoAnio = DB::table('pedido_productos')
         ->join('productos', 'pedido_productos.producto_id', '=', 'productos.id')
         ->join('pedidos', 'pedido_productos.pedido_id', '=', 'pedidos.id')
         ->where('pedidos.created_at', '>=', $fechaHaceUnAnio)
         ->select('productos.nombre', DB::raw('COUNT(DISTINCT pedido_productos.pedido_id) as total'))
         ->groupBy('productos.nombre')
         ->orderByDesc('total')
         ->take(5)
         ->get();
     // Tareas pendientes
     $TareasList = Tareas::where('estatus', 0)->get();
     //dd($VentasAnuales);

     // Retornar a la vista
     return view($this->f.'dashboard', [
       'topes' => $TopesAnuales,
       'ventasanuales' => $VentasAnuales,
       'tareas' => $TareasList,
       'movimientos' => $movimientos,
       'balance' => $balance,
       'pedidos' => $pedidos,
       'ImssPayments' => $ImssPayments,
       'IsnPayments' => $IsnPayments,
       'SatPayments' => $SatPayments,
       'ultimospedidos' => $ultimospedidos,
       'pedidosActivos' => $pedidosActivos,
       'totalSaldoPedidos' => $totalSaldoPedidos,
       'totalCobradoPedidos' => $totalCobradoPedidos,
       'productosUltimoAnio' => $productosUltimoAnio,
       'totalVentasLastYear' => $totalVentasLastYear,
       'totalVentasCurrentYear' => $totalVentasCurrentYear
     ]);

   }
}
