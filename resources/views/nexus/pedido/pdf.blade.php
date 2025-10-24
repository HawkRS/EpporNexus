<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido #{{ $pedido->folio }}</title>

    <style>
        /* La fuente Montserrat debe estar instalada en el entorno de PDF */
        @font-face {
            font-family: 'Montserrat';
            src: url({{ storage_path('fonts\Montserrat-Regular.ttf') }}) format("truetype");
            font-weight: 400;
            font-style: normal;
        }

        body{
            font-family: 'Montserrat', sans-serif;
            line-height : 15px;
        }

        /* [Clases de margin y padding omitidas para brevedad, pero mantenidas en el código] */

        .full-width{width: 100%;}
        .page-break {page-break-after: always;}
        .spacer{padding-top: 50px; padding-bottom: 30px;}

        .fnt8{ font-size: 8px }
        .fnt9{ font-size: 9px }
        .fnt10{ font-size: 10px }
        .fnt12{ font-size: 12px }
        .fnt14{ font-size: 14px }
        .fnt16{ font-size: 16px }
        .fnt18{ font-size: 18px }
        .fnt20{ font-size: 20px }
        .fnt22{ font-size: 22px }
        .fnt24{ font-size: 24px }
        .fnt26{ font-size: 26px }
        .fnt28{ font-size: 28px }
        .fnt_blue{ color: #005183 !important;}
        .fnt_dblue{ color: #002e4d !important;}
        .fnt_grey{ color: #343436 !important;}
        .fnt_lgrey{ color: #b1b1b1 !important;}
        .fnt_red{ color: #e54b4b !important;}
        .fnt_black{ color: #0d1821 !important;}
        .fnt_white{ color: #fff !important;}
        .fntB{ font-weight: bold !important;}
        .fntL{ font-weight: 100 !important;}
        .text-uppercase{ text-transform: uppercase !important;}

        /* Estilos generales */
        .header-table {
            width: 100%;
            margin-bottom: 20px;
        }
        .header-table img {
            width: 200px;
            vertical-align: middle;
        }
        .header-table .text {
            text-align: right;
            vertical-align: middle;
        }
        .bg_blue{
            background-color: #005183;
            padding: 8px 5px;
        }
        .details, .products, .client { width: 100%; margin-bottom: 15px; }
        .text-right { text-align: right; }
        table{ width: 100%; }
        .products, .client, .bancostable, .payments-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        /* Estilo para hacer las filas striped */
        .products thead tr, .client thead tr, .payments-table thead tr {
            background-color: #005183;
            color: white;
        }
        /* Estilos de las celdas del encabezado */
        .products th, .payments-table th {
            padding: 8px;
            border: none;
        }

        /* IMPORTANTE: Dompdf/el generador de PDF usará thead para repetir el encabezado
           en nuevas páginas si la tabla es demasiado larga. */

        /* Alternancia de colores en filas */
        .products tbody tr:not(:nth-last-child(-n+3)):nth-child(odd), .payments-table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        .products tbody tr:not(:nth-last-child(-n+3)):nth-child(even), .payments-table tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        /* Estilos de las celdas del cuerpo */
        .products td, .payments-table td {
            padding: 8px;
            border: none;
        }
        .prod-img{
            width:60px;
        }

        /* --- ESTILOS PARA LA NUEVA ÁREA DE RESUMEN (PAGOS Y BANCOS) --- */
        .summary-area {
            width: 100%;
            margin-top: 20px;
        }
        /* Bloque final que contiene el resumen y los términos.
           Usamos 'page-break-inside: avoid' para evitar que este bloque
           (Pagos/Bancos/Términos) se corte a la mitad de una página. */
        .final-summary-block {
            page-break-inside: avoid;
        }

        .payments-table {
            width: 100%;
            margin-bottom: 10px;
        }
        .payments-table .saldo-value {
            background-color: #002e4d;
            color: #fff;
            font-weight: bold;
        }
        .bancos {
            font-size: 10px;
            line-height : 10px;
            padding: 10px;
        }
        .bancos table {
            width: 100%;
            border: 1px solid #005183;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .bancos td {
            padding: 5px;
            border: 1px solid #e0e0e0;
        }
        .bancos .header-banco {
            background-color: #005183;
            color: #fff;
            font-weight: bold;
            font-size: 14px;
            padding: 5px;
            text-align: center;
        }


        /* Alineación de la tabla de TOTALES */
        .totals-row td:nth-child(4) {
            text-align: right;
        }
        .totals-row td:last-child {
            width: 15%;
        }

        /* Footer styles */
        /* IMPORTANTE: position: fixed mantiene el footer en cada página */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: #005183;
            color: white;
            text-align: center;
        }
        .footer table {
            width: 100%;
            text-align: center;
            color: white;
        }
        .footer_img {
            height:25px;
            vertical-align: middle;
            margin-right: 5px;
        }
        .footer table tbody tr td {
            vertical-align: middle;
            font-size: 12px;
        }
        .footer_text{
            font-weight: bold;
            vertical-align: middle;
            font-size: 16px;
            font-family: 'Montserrat', sans-serif !important;
        }
        .terms{
            line-height : 5px;
        }
        .logo{
            width: 100%;
        }

    </style>
</head>
<body>
    {{-- Mapeo para traducir IDs a nombres --}}
    <?php
    // Mapeo de IDs de bancos a nombres (según tu formulario)
    $banco_options = [
        1 => 'Banamex GOMC', 2 => 'Banamex GOHC', 3 => 'HSBC DAGH',
        4 => 'Mercado Libre', 5 => 'Otro',
    ];

    // Mapeo de IDs de métodos de pago a nombres (según tu formulario)
    $metodo_options = [
        1 => 'Efectivo', 2 => 'Transferencia', 3 => 'Cheque',
        4 => 'Mercado Libre', 5 => 'Otro', 6 => 'Depósito',
    ];

    // Función de ayuda para obtener el nombre
    function getPaymentName($id, $map) {
        $id = (int) $id;
        return $map[$id] ?? $id;
    }
    ?>


    <table class="header-table mb-5">
        <tr>
            <!-- Imagen a la izquierda -->
            <td>
                @if($opciones->datos == 2 || $opciones->datos == 3)
                    <img class="logo" src="{{$logoSrc}}" alt="EpporLogo">
                @endif
            </td>
            <!-- Texto a la derecha, alineado a la misma altura -->
            <td class="text">
                <p class="fnt10 fnt_grey text-right">
                    @if($opciones->datos == 1 || $opciones->datos == 3)
                        <span>Carlos A. González M.</span> <br>
                    @endif
                    @if($opciones->datos == 2 || $opciones->datos == 3)
                        <span>EPPOR Equipos para la Porcicultura</span> <br>
                    @endif
                    <span>Lauro Badillo Diaz #420 Col. Brisas de Chapala</span> <br>
                    <span>Tlaquepaque Jalisco. C.P. 45590</span> <br>
                    <span>Tel. 33-36-70-69-91</span>
                </p>
            </td>
        </tr>
    </table>

    <h1 class="text-right fnt30 fntB fnt_dblue">PEDIDO {{-- $pedido->folio --}}</h1>
    <table class="client">
        <tr class="bg_blue">
            <td class="bg_blue fnt_white text-uppercase fnt14"><strong>CLIENTE:</strong> {{ $pedido->cliente->identificador }}</td>
            <td class="bg_blue fnt_white text-uppercase fnt14"><strong>RFC:</strong>{{ $pedido->cliente->rfc }}</td>
            <td class="bg_blue fnt_white text-uppercase fnt14"><strong>Fecha:</strong> {{ $pedido->fecha }}</td>
        </tr>
        <tr>
            <td class="fnt12"><strong class="fnt_blue">Atencion: </strong></td>
            <td></td>
            <td class="fnt12"><strong class="fnt_blue">Telefono: </strong> {{ $pedido->cliente->telefono }}</td>
            <td></td>
        </tr>
        <tr>
            <td class="fnt12"><strong class="fnt_blue">Dirección: </strong> {{ $pedido->cliente->direccion }}</td>
            <td></td>
            <td class="fnt12"><strong class="fnt_blue">Codigo: </strong> {{ $pedido->cliente->codigopostal }}</td>
            <td></td>
        </tr>
        <tr>
            <td class="fnt12"><strong class="fnt_blue">Colonia: </strong>{{ $pedido->cliente->colonia }}</td>
            <td></td>
            <td class="fnt12"><strong class="fnt_blue">Estado: </strong> {{ $pedido->cliente->estado }}</td>
            <td></td>
        </tr>
        <tr>
            <td class="fnt12"><strong class="fnt_blue">Ciudad: </strong> {{ $pedido->cliente->municipio }}</td>
            <td></td>
            <td class="fnt12"><strong class="fnt_blue">Email: </strong> {{ $pedido->cliente->correo }}</td>
            <td></td>
        </tr>
    </table>

    {{-- TABLA PRINCIPAL DE PRODUCTOS: Si esta tabla excede el tamaño de la página,
         Dompdf repetirá el <thead> automáticamente. --}}
    <table class="products mb-0">
        <thead class="bg_blue">
            <tr>
                <th class="text-uppercase fnt14" style="width: 8%;">Ctd</th>
                <th class="text-uppercase fnt14" style="width: 45%;">Descripcion</th>
                <th class="text-uppercase fnt14" style="width: 15%;">Imagen</th>
                <th class="text-uppercase fnt14" style="width: 17%;">Precio</th>
                <th class="text-uppercase fnt14" style="width: 15%;">&nbsp; Importe &nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedido->productos as $producto)
            <tr class="prodrows">
                <td class="fnt12 fnt_black">{{ $producto->pivot->cantidad }}</td>
                <td class="fnt12 fnt_black">{{ $producto->nombre }}</td>

                <td class="fnt12 fnt_black">
                    {{-- Usamos $producto->mime_type del controlador --}}
                    <img class="prod-img"
                         src="data:{{ $producto->mime_type ?? 'image/png' }};base64,{{ $producto->imagen_base64 }}"
                         alt="{{ $producto->codigo }}">
                </td>

                <td class="fnt12 fnt_black text-right">${{ number_format($producto->pivot->precio, 2) }}</td>
                <td class="fnt12 fnt_black text-right">${{ number_format($producto->pivot->total, 2) }}</td>
            </tr>
            @endforeach

            {{-- FILAS DE TOTALES - NOTA: Estas filas deben ir pegadas al último producto si es posible. --}}
            @if($pedido->factura == 1)
            <tr class="totals-row">
                <td></td>
                <td></td>
                <td></td>
                <td class="bg_blue fntB fnt_white text-right">SUBTOTAL</td>
                <td class="fntB fnt_dblue text-right">${{ number_format($pedido->subtotal, 2) }}</td>
            </tr>
            <tr class="totals-row">
                <td></td>
                <td></td>
                <td></td>
                <td class="bg_blue fntB fnt_white text-right">IVA</td>
                <td class="fntB fnt_dblue text-right">${{ number_format($pedido->iva, 2) }}</td>
            </tr>
            @endif
            <tr class="totals-row">
                <td></td>
                <td></td>
                <td></td>
                <td class="bg_blue fntB fnt_white text-right">TOTAL</td>
                <td class="fntB fnt_dblue text-right">${{ number_format($pedido->total, 2) }}</td>
            </tr>
        </tbody>
    </table>


    {{-- BLOQUE FINAL: Resumen de pagos, bancos y términos. Se pide no cortar este bloque (page-break-inside: avoid). --}}
    <div class="final-summary-block">

        {{-- ÁREA DE RESUMEN: PAGOS Y BANCOS --}}
        <table class="summary-area">
            <tr>
                {{-- COLUMNA 1: PAGOS DETALLADOS (50% ANCHO) --}}
                <td style="width: 50%; padding-right: 20px;" valign="top">
                    @if($pedido->pagos()->count() > 0)
                        <h4 class="fnt14 fnt_dblue m-0">Detalle de Pagos Realizados:</h4>
                        <table class="payments-table fnt10">
                            <thead>
                                <tr>
                                    <th style="width: 55%;">MÉTODO / BANCO</th>
                                    <th style="width: 25%;">FECHA</th>
                                    <th style="width: 20%;" class="text-right">IMPORTE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pedido->pagos as $pago)
                                <tr>
                                    {{-- Lógica para mostrar Banco o Método --}}
                                    <td>
                                        @if($pago->banco_receptor)
                                            {{-- Si hay banco receptor, mostramos el nombre del banco --}}
                                            <strong class="fnt_dblue fntB">Banco: {{ getPaymentName($pago->banco_receptor, $banco_options) }}</strong>
                                        @else
                                            {{-- Si no hay banco receptor, mostramos el método de pago --}}
                                            {{ getPaymentName($pago->metodo, $metodo_options) }}
                                        @endif
                                    </td>
                                    {{-- Formato de Fecha DD-MM-YY --}}
                                    <td>{{ date('d-m-y', strtotime($pago->fecha)) }}</td>
                                    <td class="text-right">${{ number_format($pago->monto, 2) }}</td>
                                </tr>
                                @endforeach

                                {{-- FILA FINAL DE SALDO --}}
                                <tr>
                                    <td colspan="2" class="bg_blue fntB fnt_white text-right">SALDO PENDIENTE</td>
                                    <td class="saldo-value text-right">${{ number_format($pedido->saldo, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </td>

                {{-- COLUMNA 2: INFORMACIÓN BANCARIA (50% ANCHO) --}}
                <td style="width: 50%;" valign="top">
                    @if($opciones->flagbanco == 1 && isset($datosBancarios) && $datosBancarios->count() > 0)
                        <h4 class="fnt14 fnt_dblue m-0">Información Bancaria para Pagos:</h4>
                        <div class="bancos">
                            @foreach($datosBancarios as $banco)
                            <table>
                                <tr>
                                    <td colspan="2" class="header-banco">{{ $banco->nombre }} ({{ $banco->banco }})</td>
                                </tr>
                                <tr>
                                    <td class="fntB fnt_dblue" style="width: 35%;">Titular:</td>
                                    <td class="fnt10">{{ $banco->titular }}</td>
                                </tr>
                                @if($banco->clabe)
                                <tr>
                                    <td class="fntB fnt_dblue">CLABE:</td>
                                    <td class="fnt10">{{ $banco->clabe }}</td>
                                </tr>
                                @endif
                                @if($banco->cuenta)
                                <tr>
                                    <td class="fntB fnt_dblue">Cuenta:</td>
                                    <td class="fnt10">{{ $banco->cuenta }} (SUC: {{ $banco->sucursal ?? 'N/A' }})</td>
                                </tr>
                                @endif
                                @if($banco->tarjeta)
                                <tr>
                                    <td class="fntB fnt_dblue">Tarjeta:</td>
                                    <td class="fnt10">{{ $banco->tarjeta }}</td>
                                </tr>
                                @endif
                            </table>
                            @endforeach
                        </div>
                    @endif
                </td>
            </tr>
        </table>

        {{-- TÉRMINOS Y CONDICIONES --}}
        <div class="terms pt-3">
            <h2 class="fnt_lgrey fnt20">Términos y condiciones</h2>
            <p class="fnt9 fnt_lgrey"><strong>.-Vigencia de Precios:</strong> Este precio es válido durante 30 días desde la emisión del pedido. Pasado este plazo, el precio puede ajustarse si no se ha realizado un anticipo.</p>
            <p class="fnt9 fnt_lgrey"><strong>.-Envíos por Paquetería:</strong> Nuestra responsabilidad termina al entregar el pedido a la empresa de paquetería. El riesgo de envío pasa al cliente en este punto.</p>
            <p class="fnt9 fnt_lgrey"><strong>.-Horarios de Entrega:</strong> Recolección en nuestras instalaciones: Lunes a viernes de 9:00 am a 1:00 pm y de 3:00 pm a 5:00 pm; sábados de 9:00 am a 1:00 pm.</p>
            <p class="fnt9 fnt_lgrey"><strong>.-Almacenaje:</strong> El cliente cuenta con 30 días para recoger el material una vez notificado. Después de este plazo, se aplicará un cargo por almacenaje.</p>
            <p class="fnt9 fnt_lgrey"><strong>.-Garantía:</strong> La garantía cubre únicamente defectos de fabricación dentro de los primeros 6 meses, y se requerirá evidencia fotográfica y recibo para hacerla válida.</p>
        </div>
    </div>

    <!-- Footer que estará siempre al pie de página -->
    <div class="footer pt-2">
        <table>
            <tbody>
                <tr class="pb-1">
                    <td>
                        {{-- Iconos de redes sociales aquí --}}
                        <span class="footer_text">33-36-70-69-91</span>
                    </td>
                    <td class="fntB fnt18">
                        <span class="footer_text">eppormx</span>
                    </td>
                    <td class="fntB fnt18">
                        <span class="footer_text">www.eppor.com.mx</span>
                    </td>
                </tr>
            </tbody>
        </table>
        <span class="fnt16 pb-2 fnt_white"> Lauro Badillo Diaz #420 Col. Brisas de Chapala, Tlaquepaque, Jalisco. C.P. 45590</span>
    </div>
</body>
</html>
