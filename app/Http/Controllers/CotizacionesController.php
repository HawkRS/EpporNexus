<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CotizacionProducto;
use App\Models\DatosBancarios;
use App\Models\Cotizacion;
use App\Models\Productos;
use App\Models\Clientes;
use App\Models\Persona;
use App\Models\Pedido;
use App\User;
use Carbon\Carbon;
use PDF;

class CotizacionesController extends Controller
{
  //
  private $f = 'nexus.cotizaciones.';

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $cotizaciones = Cotizacion::orderBy('id', 'desc')->get();
    $clientes = Clientes::orderBy('identificador', 'asc')->get();
    return view($this->f . 'index', [
      'cotizaciones' => $cotizaciones,
      'clientes' => $clientes,
    ]);
  }
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
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


    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
      dd($request->all());
      $request->validate([
      'cliente_id' => 'required|exists:clientes,id',
      'usuario_id' => 'required|exists:users,id',
      'producto' => 'required|array|min:1',
      'producto.*' => 'required|exists:productos,id',
      'precio' => 'required|array',
      'precio.*' => 'required|numeric|min:0',
      'cantidad' => 'required|array',
      'cantidad.*' => 'required|integer|min:1',
      'descuento' => 'nullable|array',
      'descuento.*' => 'nullable|numeric|min:0',
      'estado' => 'required|string',
      'metodo_entrega' => 'required|string',
      'factura' => 'required|boolean',
      'comentarios' => 'nullable|string',
      ]);

      $subtotal = 0;

      foreach ($request->producto as $index => $producto) {
        $precioFinal = $request['precio'][$index] * $request['cantidad'][$index] - ($request['descuento'][$index] ?? 0);
        $subtotal += $precioFinal;
      }

      $iva = $request->factura ? $subtotal * 0.16 : 0;
      $total = $subtotal + $iva;

      $cotizacion = Cotizacion::create([
      'cliente_id' => $request->cliente_id,
      'usuario_id' => $request->usuario_id,
      'folio' => Cotizacion::max('folio') + 1,
      'subtotal' => $subtotal,
      'iva' => $iva,
      'total' => $total,
      'saldo' => $total,
      'estado' => $request->estado,
      'metodo_entrega' => $request->metodo_entrega,
      'factura' => $request->factura ? 1 : 0,
      'comentarios' => $request->comentarios,
      ]);

      foreach ($request->producto as $index => $productoId) {
        CotizacionProducto::create([
        'cotizacion_id' => $cotizacion->id,
        'producto_id' => $productoId,
        'cantidad' => $request->cantidad[$index],
        'precio' => $request->precio[$index],
        'descuento' => $request->descuento[$index] ?? 0,
        'total' => ($request->precio[$index] * $request->cantidad[$index]) - ($request->descuento[$index] ?? 0),
        ]);
      }

      return redirect()->route('cotizacion.index')->with('success', 'Cotización creada exitosamente.');
    }



    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
      $cotizacion = Cotizacion::findOrFail($id);
      //dd($cotizacion);
      $productos = $cotizacion->productos();
      $cliente = Clientes::findOrFail($cotizacion->cliente_id);

      return view($this->f.'show', compact('cotizacion', 'cliente', 'productos'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
      $cotizacion = Cotizacion::with('productos')->findOrFail($id);
      $clientes = Clientes::all();
      return view($this->f.'edit', compact('cotizacion', 'clientes'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
      $cotizacion = Cotizacion::findOrFail($id);

      $cotizacion->cliente_id = $request->cliente_id;
      $cotizacion->estado = $request->estado;
      $cotizacion->metodo_entrega = $request->metodo_entrega;
      $cotizacion->factura = $request->has('factura') ? 1 : 0;
      $cotizacion->comentarios = $request->comentarios;

      $subtotal = 0;
      $productos = [];

      foreach ($request->productos as $producto_id => $producto_data) {
        $cantidad = $producto_data['cantidad'];
        $precio = $producto_data['precio'];
        $subtotal += $cantidad * $precio;
        $productos[$producto_id] = ['cantidad' => $cantidad, 'precio' => $precio];
      }

      $cotizacion->subtotal = $subtotal;
      $cotizacion->iva = $cotizacion->factura ? $subtotal * 0.16 : 0;
      $cotizacion->total = $cotizacion->subtotal + $cotizacion->iva;

      $cotizacion->save();
      $cotizacion->productos()->sync($productos);

      return redirect()->route('cotizacion.index')->with('success', 'Cotización actualizada con éxito');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Cotizacion $cotizacion)
    {
      $cotizacion->delete();
      return redirect()->route('cotizacion.index')->with('success', 'Cotización eliminada exitosamente.');
    }

    public function generarPDF(Request $request, $id)
    {
      //dd($request->all());
      $request->validate([
      'banco' => 'required|integer|min:1', // Validar que cada cantidad es un número entero y positivo
      ]);
      $logoPath = public_path('img/EpporLogoC.png');

      // Verifica si el archivo existe antes de leerlo
      if (file_exists($logoPath)) {
          $logoBase64 = base64_encode(file_get_contents($logoPath));
          $logoSrc = 'data:image/' . pathinfo($logoPath, PATHINFO_EXTENSION) . ';base64,' . $logoBase64;
      } else {
          // Proporcionar un placeholder o un logo de respaldo si el archivo no existe
          $logoSrc = '';
      }
      $pedido = Pedido::with(['cliente', 'productos'])->findOrFail($id);

      $pedido->productos->each(function ($producto) {
          // Asumiendo que las imágenes de productos están en public/img/prods/
          // y que el campo 'img' contiene el nombre del archivo (ej. 'arreadores.jpg')
          $imageFileName = $producto->codigo.'.jpg';

          if ($imageFileName) {
              $imagePath = public_path('img/prods/' . $imageFileName);

              if (file_exists($imagePath)) {
                  //dd($imagePath);
                  $imageContent = file_get_contents($imagePath);
                  $mimeType = mime_content_type($imagePath);

                  // Asignamos la Data URL completa a una nueva propiedad
                  // Esto facilita el uso directo en el Blade
                  $producto->imagen_base64 = base64_encode($imageContent);
                  $producto->mime_type = $mimeType; // Guardamos el tipo MIME

              } else {
                  // Si el archivo no existe, asignamos Base64 vacío
                  //dd('vacio');
                  $producto->imagen_base64 = '';
                  $producto->mime_type = 'image/jpg'; // Default
                  // Opcional: Asignar una imagen placeholder Base64 aquí.
              }
          } else {
              $producto->imagen_base64 = '';
              $producto->mime_type = 'image/jpg'; // Default
          }
      });
      //dd($request->all());
      //dd($id, Cotizacion::find($id));
      $bankinfo = DatosBancarios::findOrFail($request->banco);
      $opciones = $request;
      //dd($opciones->banco);
      $cotizacion = Cotizacion::with(['cliente', 'productos'])->findOrFail($id);
      $pdf = PDF::loadView('nexus.cotizaciones.pdf', compact('cotizacion', 'bankinfo', 'opciones', 'logoSrc'));
      //dd($pdf);
      $date = Carbon::parse($cotizacion->created_at);

      $pdf->setPaper('A4', 'portrait');
      //dd('hola');
      return $pdf->stream("Cotizacion_" . str_replace(' ', '', ucwords(strtolower($cotizacion->cliente->identificador))) . "_" . date_format($date, 'dmY'). ".pdf");// download O 'stream' para ver en navegador

    }

    public function generarPedido($id)
    {
      DB::beginTransaction();

      try {
        $cotizacion = Cotizacion::with('productos')->findOrFail($id);

        // Crear nuevo pedido con los mismos datos
        $pedido = Pedido::create([
        'cliente_id'      => $cotizacion->cliente_id,
        'usuario_id'      => $cotizacion->usuario_id,
        'folio'           => $this->getNuevoFolioPedido(), // lógica para folio incremental
        'subtotal'        => $cotizacion->subtotal,
        'iva'             => $cotizacion->iva,
        'total'           => $cotizacion->total,
        'saldo'           => $cotizacion->total, // Asumes que aún no paga nada
        'estado'          => 'ordenado',
        'metodo_entrega'  => $cotizacion->metodo_entrega,
        'factura'         => $cotizacion->factura,
        'foliofiscal'     => null,
        'paqueteria'      => null,
        'numero_guia'     => null,
        ]);

        // Copiar productos
        foreach ($cotizacion->productos as $producto) {
          $pedido->productos()->attach($producto->id, [
          'cantidad'  => $producto->pivot->cantidad,
          'precio'    => $producto->pivot->precio,
          'descuento' => $producto->pivot->descuento,
          'total'     => $producto->pivot->total,
          'created_at'=> now(),
          'updated_at'=> now(),
          ]);
        }

        // Opcional: actualizar estado de la cotización o marcarla como usada
        $cotizacion->estado = 'convertida';
        $cotizacion->save();
        //dd($pedido);
        DB::commit();

        return redirect()->route('pedidos.show', $pedido->id)
        ->with('success', 'La cotización fue convertida en pedido correctamente.');

      } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Error al convertir la cotización: ' . $e->getMessage());
      }
      return redirect()->route('pedido.show', ['id' => $pedido->id])->with('success', ' Pedido creada exitosamente.');
    }

    private function getNuevoFolioPedido()
    {
      return \App\Models\Pedido::max('folio') + 1;
    }

  }
