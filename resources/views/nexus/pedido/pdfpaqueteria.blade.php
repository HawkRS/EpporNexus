<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Etiqueta de Envío</title>

  <style>
  /* Define el tamaño y margen de la etiqueta (A6) */
@page {
    size: 4in 6in; /* 10.16cm x 15.24cm, cerca de A6 */
    margin: 0.25in; /* Márgenes de 6.35mm */
}

  @font-face {
    font-family: 'Montserrat';
    src: {!! $fonts['fontMontserrat'] !!} format("truetype");
    font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
    font-style: normal; // use the matching font-style here
  }
  @font-face {
    font-family: 'barcode18';
    src: {!! $fonts['fontBarcode128'] !!} format("truetype");
    font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
    font-style: normal; // use the matching font-style here
  }

  body{
    font-family: 'Montserrat', sans-serif;
    line-height : 15px;
  }
  .barcode{    font-family: 'barcode18', sans-serif !important;}
  .container {
    width: 90%;
    height: 90%;
    box-sizing: border-box;
    border: 2px solid #333; /* Borde visual para la etiqueta */
    padding: 15px;
    border-radius: 10px;
}
.logo-container{
  text-align: center;
}


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
  .fnt60{ font-size: 60px }
  .pt-3,.py-3 {  padding-top: 1rem !important;  }
  .fntB{ font-weight: bold !important;}
  .fntL{ font-weight: 100 !important;}
  .text-uppercase{ text-transform: uppercase !important;}

  /* Estilos generales */
  .header-table {
    width: 100%;
    margin-bottom: 20px;
  }
  .header-table img {
    width: 200px; /* Ajusta el tamaño de la imagen */
    vertical-align: middle; /* Alinea la imagen con el texto */
  }
  .header-table .text {
    text-align: right;
    vertical-align: middle; /* Alinea el texto con la imagen */
  }
  .details, .products, .client { width: 100%; margin-bottom: 15px; }
  .text-right { text-align: right; }
  table{  width: 100%;  }

</style>
</head>
<body>
  @for ($i = 1; $i <= $opciones->numetiquetas; $i++)
  <div class="container">

          <!-- HEADER: Logo y Datos del Remitente -->
          <div class="header">
              <div class="logo-container">
                  <!-- LOGO DEL REMITENTE -->
                  <img src="{{$logoSrc }}" alt="Eppor"  style="max-width: 80%; margin:auto;">
              </div>
              <hr>
              <div class="header-right">
                  <!-- Datos de quien Envía (Remitente) -->
                  <p class="fnt16">
                      <strong>Remitente:</strong> {{ $datosEmisor['nombre'] ?? $cliente->pedido }}<br>
                      {{ $datosEmisor['ciudad'] ?? 'Ciudad Origen' }}, {{ $datosEmisor['estado'] ?? 'Estado' }}, CP: {{$datosEmisor['cp']}}
                  </p>
              </div>
          </div>
          <hr>
          <!-- SECCIÓN DE DESTINATARIO -->
          <div class="address-box">
              @if (($datosenvio ?? 1) == 2) {{-- 2 = A Domicilio --}}
              <p class="fnt16">
                  <strong>Destinatario:</strong> {{ $datosReceptor['nombre'] ?? 'Destinatario Predeterminado' }}
              </p>
              @else
              <p class="fnt16">
                  <strong>Destinatario:</strong> {{ ucwords(strtolower($pedido->cliente->identificador)) }}
              </p>
              @endif
              @if (($tipo_entrega ?? 1) == 2) {{-- 2 = A Domicilio --}}
                  <p>
                      Tipo de Entrega: Domicilio<br>
                      Dirección: {{ $datosReceptor['domicilio'] ?? 'Domicilio Completo' }}<br>
                      Colonia: {{ $datosReceptor['colonia'] ?? 'Colonia' }}
                  </p>
              @else {{-- 1 = Ocurre/Recolección --}}
                  <p>
                    <strong>Destino:</strong> Ocurre,  {{$datosReceptor['ciudad']}},  {{$datosReceptor['estado']}}, CP:{{ $datosReceptor['codigo_postal'] ?? '99999' }}
                  </p>
              @endif
          </div>
          <hr>
          <div class="">
            <table>
              <tbody>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td class="fnt24">CTD de Paquetes: {{ $i }}/{{$opciones->numetiquetas}}</td>
              </tbody>
            </table>
          </div>
          <hr>
          <div class="">
            <table class="text-center">
              <tbody>
                <tr><td>&nbsp;&nbsp;&nbsp;</td>  </tr>
                <tr class="pt-3">
                  <?php $foliazo = str_pad((string)$pedido->folio, 12, '0', STR_PAD_LEFT); ?>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td class="fnt60 barcode">{{$foliazo}}</td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
          </div>
          <hr>

          <div class="fnt20">
            <table>
              <tbody>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td class="fnt20">WWW.EPPOR.COM.MX</td>
                  <td></td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td class="fnt14">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CALIDAD Y PRECIO</td>
                  <td></td
                </tr>
              </tbody>
            </table>
           </div>

      </div>
      @endfor
</body>
</html>









