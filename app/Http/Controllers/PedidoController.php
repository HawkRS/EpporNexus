<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\DatosBancarios;
use App\Models\PedidoProducto;
use App\Models\Productos;
use App\Models\Clientes;
use App\Models\Persona;
use App\Models\Pedido;
use App\Models\Guias;
use App\User;
use Carbon\Carbon;
use PDF;


class PedidoController extends Controller
{
  private $f = 'nexus.pedido.';



  public function index(Request $request)
  {
      // Base query
      $query = Pedido::query();

      // Filtros
      if ($request->filled('cliente')) {
          $query->whereHas('cliente', function ($q) use ($request) {
              $q->where('identificador', 'like', '%' . $request->cliente . '%');
          });
      }

      if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
          $query->whereBetween('created_at', [
              $request->fecha_inicio . ' 00:00:00',
              $request->fecha_fin . ' 23:59:59',
          ]);
      }

      if ($request->filled('producto')) {
          $query->whereHas('productos', function ($q) use ($request) {
              $q->where('nombre', 'like', '%' . $request->producto . '%');
          });
      }

      if ($request->has('saldo_pendiente')) {
          $query->where('saldo', '>', 0);
      }

      if ($request->filled('estado')) {
          $query->where('estado', $request->estado);
      }

      if ($request->filled('entrega')) {
          $query->where('metodo_entrega', $request->entrega);
      }

      if ($request->filled('pagado')) {
          $query->where(function ($q) use ($request) {
              if ($request->pagado == 'si') {
                  $q->where('saldo', '<=', 0);
              } elseif ($request->pagado == 'no') {
                  $q->where('saldo', '>', 0);
              }
          });
      }

      // Clonamos el query para reutilizarlo sin modificar el original
      $pedidosQuery = clone $query;

      // Obtener pedidos filtrados
      $pedidos = $query->orderBy('id', 'desc')->get();

      // Clientes
      $clientes = Clientes::orderBy('identificador', 'asc')->get();

      // Gráfica 1: pedidos por estado
      $porEstado = (clone $pedidosQuery)
          ->selectRaw('estado, COUNT(*) as total')
          ->groupBy('estado')
          ->pluck('total', 'estado');

      // Gráfica 2: saldos (filtrados)
      $totalPedidos = (clone $pedidosQuery)->sum('total');
      $totalSaldo = (clone $pedidosQuery)->sum('saldo');
      $totalPagado = $totalPedidos - $totalSaldo;

      // Gráfica 3: productos más vendidos en los pedidos filtrados
      $pedidoIdsFiltrados = $pedidos->pluck('id');

      $productosContados = DB::table('pedido_productos')
          ->join('productos', 'pedido_productos.producto_id', '=', 'productos.id')
          ->whereIn('pedido_productos.pedido_id', $pedidoIdsFiltrados)
          ->select('productos.nombre', DB::raw('COUNT(DISTINCT pedido_productos.pedido_id) as total'))
          ->groupBy('productos.nombre')
          ->orderByDesc('total')
          ->take(5)
          ->get();

      return view($this->f . 'index', [
          'pedidos' => $pedidos,
          'clientes' => $clientes,
          'porEstado' => $porEstado,
          'totalPagado' => $totalPagado,
          'totalSaldo' => $totalSaldo,
          'productosContados' => $productosContados,
      ]);
  }




  public function create(Request $request)
  {
    //dd($request->all());
    $cliente = Clientes::findOrFail($request->cliente_id);
    $usuarios = User::all(); // Vendedores
    $productos = Productos::all(); // Vendedores
    return view($this->f . 'create', [
      'usuarios' => $usuarios,
      'cliente' => $cliente,
      'productos' => $productos,
    ]);
  }

    public function store(Request $request)
    {
      //dd($request->all());
      $request->validate([
        'cliente_id' => 'required|exists:clientes,id',
        'usuario_id' => 'required|exists:users,id',
        'producto' => 'required|array|min:1', // Verificar que es un array y que tiene al menos un producto
        'producto.*' => 'required|exists:productos,id', // Validar que cada producto existe en la tabla productos
        'precio' => 'required|array', // Verificar que es un array
        'precio.*' => 'required|numeric|min:0', // Validar que cada precio es numérico y no negativo
        'cantidad' => 'required|array', // Verificar que es un array
        'cantidad.*' => 'required|integer|min:1', // Validar que cada cantidad es un número entero y positivo
        'descuento' => 'nullable|array', // Verificar que es un array o nulo
        'descuento.*' => 'nullable|numeric|min:0', // Validar que cada descuento es numérico y no negativo
        'estado' => 'required|string', // Validar que el estado es una cadena
        'metodo_entrega' => 'required|string', // Validar que el método de entrega es una cadena
        'factura' => 'required|boolean', // Validar que factura es un booleano
      ]);
      //dd($request->all());

      // Inicializar el subtotal
      $subtotal = 0;

      // Calcular el subtotal a partir de los productos, aplicando descuentos
      //dd($request->producto);
      foreach ($request->producto as $index => $producto) {
        //dd($index);
        $precioFinal = $request['precio'][$index] * $request['cantidad'][$index] - $request['descuento'][$index];
        $subtotal += $precioFinal;
      }
      //dd($subtotal);

      // Calcular el IVA si es facturable
      $iva = 0;
      if ($request->factura) {
        $iva = $subtotal * 0.16; // 16% de IVA
      }

      // Calcular el total
      $total = $subtotal + $iva;

      // Crear el pedido
      $pedido = Pedido::create([
        'cliente_id' => $request->cliente_id,
        'usuario_id' => $request->usuario_id, // El vendedor
        'folio' => Pedido::max('folio') + 1, // Incrementar folio
        'subtotal' => $subtotal,
        'iva' => $iva,
        'fecha' => $request->fecha_pedido,
        'total' => $total,
        'saldo' => $total,
        'estado' => $request->estado,
        'metodo_entrega' => $request->metodo_entrega,
        'comentarios' => $request->comentarios,
        'canaldeventa' => $request->canaldeventa,
        //'paqueteria' => $request->paqueteria ?? null,
        //'numero_guia' => $request->numero_guia ?? null,
        'factura' => $request->factura ? 1 : 0,
      ]);

      // Guardar los productos en la tabla relacional pedido_productos
      foreach ($request->producto as $index => $productoId) {
          PedidoProducto::create([
              'pedido_id' => $pedido->id, // Relacionar con el pedido recién creado
              'producto_id' => $productoId,
              'cantidad' => $request->cantidad[$index],
              'precio' => $request->precio[$index],
              'descuento' => $request->descuento[$index] ?? 0,
              'total' => ($request->precio[$index] * $request->cantidad[$index]) - ($request->descuento[$index] ?? 0),
          ]);
      }

        return redirect()->route('pedidos.show', ['id' => $pedido->id])->with('success', 'Pedido creado exitosamente.');
      }

    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        $productos = $pedido->productos();
        //dd($productos);
        $cliente = Clientes::findOrFail($pedido->cliente_id);

        return view($this->f.'show', compact('pedido', 'cliente', 'productos'));
    }

    // app/Http/Controllers/PedidosController.php

    public function edit($id)
    {
        $pedido = Pedido::with('productos')->findOrFail($id);
        $clientes = Clientes::all(); // Lista de clientes
        return view($this->f.'edit', compact('pedido', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);

        // Actualizar datos básicos del pedido
        $pedido->cliente_id = $request->cliente_id;
        $pedido->estado = $request->estado;
        $pedido->fecha = $request->fecha_pedido;
        $pedido->metodo_entrega = $request->metodo_entrega;
        $pedido->factura = $request->has('factura') ? 1 : 0;

        // Calcular totales
        $subtotal = 0;
        $productos = [];

        foreach ($request->productos as $producto_id => $producto_data) {
            $cantidad = $producto_data['cantidad'];
            $precio = $producto_data['precio'];
            $subtotal += $cantidad * $precio;

            // Actualizar o sincronizar productos con el pedido
            $productos[$producto_id] = ['cantidad' => $cantidad, 'precio' => $precio];
        }

        $pedido->subtotal = $subtotal;
        $pedido->iva = $pedido->factura ? $subtotal * 0.16 : 0;
        $pedido->total = $pedido->subtotal + $pedido->iva;

        $pedido->save();
        $pedido->productos()->sync($productos);

        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado con éxito');
    }


    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado exitosamente.');
    }


    public function generarPDF(Request $request, $id)
    {
      $request->validate([
        'banco' => 'required|integer|min:1', // Validar que cada cantidad es un número entero y positivo
      ]);
      //dd($request->all());
      //$bankinfo = DatosBancarios::findOrFail($request->banco);
      $opciones = $request;
      //dd($bankinfo);
      $pedido = Pedido::with(['cliente', 'productos'])->findOrFail($id);

      $pdf = PDF::loadView('nexus.pedido.pdf', compact('pedido', 'opciones'));
      $date = Carbon::parse($pedido->created_at);
      //dd($pedido->cliente->identificador);
      // Opciones adicionales de PDF si deseas modificar la orientación o tamaño de papel
      $pdf->setPaper('A4', 'portrait');
      //'_'.$customer[0]->nombre.$customer[0]->apellidos.date_format($date,'dmY')
      return $pdf->stream("Pedido_" . str_replace(' ', '', ucwords(strtolower($pedido->cliente->identificador))) . "_" . date_format($date, 'dmY'). ".pdf");// download O 'stream' para ver en navegador

    }

    public function generarPDFPaqueteria(Request $request, $id)
    {
      dd($pedido);
      $pedido = Pedido::with(['cliente', 'productos'])->findOrFail($id);
      $opciones = $request;
      $pdf = PDF::loadView('admin.pedido.pdfpaqueteria', compact('pedido', 'opciones'));
      $date = Carbon::parse($pedido->created_at);
      // Opciones adicionales de PDF si deseas modificar la orientación o tamaño de papel
      $pdf->setPaper('A4', 'portrait');
      return $pdf->stream("Pedido_" . str_replace(' ', '', ucwords(strtolower($pedido->cliente->identificador))) . "_paqueteria_" . date_format($date, 'dmY'). ".pdf");// download O 'stream' para ver en navegador
    }

    public function addGuia(Request $request, $id)
    {
      $pedido = Pedido::findOrFail($id);
      $request->validate([
         'paqueteria' => 'required|string|max:255',
         'guia' => 'required|string|max:255',
     ]);
     Guias::create([
          'paqueteria' => $request->paqueteria,
          'guia' => $request->guia,
          'pedido_id' => $id,
      ]);
      return redirect()->route('pedidos.show', ['id' => $pedido->id])->with('success', ' Guia creada exitosamente.');
    }


    public function editdate(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        return view($this->f.'editarfecha', compact('pedido'));
    }

    public function storedate(Request $request, $id)
    {
      $pedido = Pedido::findOrFail($id);
      $request->validate([
           'fecha' => 'required|date',
       ]);
      $pedido->fecha = $request->fecha;
      $pedido->save();
      return redirect()->route('pedidos.show', ['id' => $pedido->id])->with('success', ' Fecha guardada exitosamente.');
    }
}
