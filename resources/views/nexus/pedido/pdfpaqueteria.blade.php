<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pedido #{{ $pedido->folio }}</title>

  <style>
  @font-face {
    font-family: 'Montserrat';
    src: url({{ storage_path('fonts\Montserrat-Regular.ttf') }}) format("truetype");
    font-weight: 400; // use the matching font-weight here ( 100, 200, 300, 400, etc).
    font-style: normal; // use the matching font-style here
  }

  body{
    font-family: 'Montserrat', sans-serif;
    line-height : 15px;
  }
  .m-0 {  margin: 0 !important;  }
  .mt-0,.my-0 {  margin-top: 0 !important;  }
  .mr-0,.mx-0 {  margin-right: 0 !important;  }
  .mb-0,.my-0 {  margin-bottom: 0 !important;  }
  .ml-0,.mx-0 {  margin-left: 0 !important;  }
  .m-1 {  margin: 0.25rem !important;  }
  .mt-1,.my-1 {  margin-top: 0.25rem !important;  }
  .mr-1,.mx-1 {  margin-right: 0.25rem !important;  }
  .mb-1,.my-1 {  margin-bottom: 0.25rem !important;  }
  .ml-1,.mx-1 {  margin-left: 0.25rem !important;  }
  .m-2 {  margin: 0.5rem !important;  }
  .mt-2,.my-2 {  margin-top: 0.5rem !important;  }
  .mr-2,.mx-2 {  margin-right: 0.5rem !important;  }
  .mb-2,.my-2 {  margin-bottom: 0.5rem !important;  }
  .ml-2,.mx-2 {  margin-left: 0.5rem !important;  }
  .m-3 {  margin: 1rem !important;  }
  .mt-3,.my-3 {  margin-top: 1rem !important;  }
  .mr-3,.mx-3 {  margin-right: 1rem !important;  }
  .mb-3,.my-3 {  margin-bottom: 1rem !important;  }
  .ml-3,.mx-3 {  margin-left: 1rem !important;  }
  .m-4 {  margin: 1.5rem !important;  }
  .mt-4,.my-4 {  margin-top: 1.5rem !important;  }
  .mr-4,.mx-4 {  margin-right: 1.5rem !important;  }
  .mb-4,.my-4 {  margin-bottom: 1.5rem !important;  }
  .ml-4,.mx-4 {  margin-left: 1.5rem !important;  }
  .m-5 {  margin: 3rem !important;  }
  .mt-5,.my-5 {  margin-top: 3rem !important;  }
  .mr-5,.mx-5 {  margin-right: 3rem !important;  }
  .mb-5,.my-5 {  margin-bottom: 3rem !important;  }
  .ml-5,.mx-5 {  margin-left: 3rem !important;  }
  .p-0 {  padding: 0 !important;  }
  .pt-0,.py-0 {  padding-top: 0 !important;  }
  .pr-0,.px-0 {  padding-right: 0 !important;  }
  .pb-0,.py-0 {  padding-bottom: 0 !important;  }
  .pl-0,.px-0 {  padding-left: 0 !important;  }
  .p-1 {  padding: 0.25rem !important;  }
  .pt-1,.py-1 {  padding-top: 0.25rem !important;  }
  .pr-1,.px-1 {  padding-right: 0.25rem !important;  }
  .pb-1,.py-1 {  padding-bottom: 0.25rem !important;  }
  .pl-1,.px-1 {  padding-left: 0.25rem !important;  }
  .p-2 {  padding: 0.5rem !important;  }
  .pt-2,.py-2 {  padding-top: 0.5rem !important;  }
  .pr-2,.px-2 {  padding-right: 0.5rem !important;  }
  .pb-2,.py-2 {  padding-bottom: 0.5rem !important;  }
  .pl-2,.px-2 {  padding-left: 0.5rem !important;  }
  .p-3 {  padding: 1rem !important;  }
  .pt-3,.py-3 {  padding-top: 1rem !important;  }
  .pr-3,.px-3 {  padding-right: 1rem !important;  }
  .pb-3,.py-3 {  padding-bottom: 1rem !important;  }
  .pl-3,.px-3 {  padding-left: 1rem !important;  }
  .p-4 {  padding: 1.5rem !important;  }
  .pt-4,.py-4 {  padding-top: 1.5rem !important;  }
  .pr-4,.px-4 {  padding-right: 1.5rem !important;  }
  .pb-4,.py-4 {  padding-bottom: 1.5rem !important;  }
  .pl-4,.px-4 {  padding-left: 1.5rem !important;  }
  .p-5 {  padding: 3rem !important;  }
  .pt-5,.py-5 {  padding-top: 3rem !important;  }
  .pr-5,.px-5 {  padding-right: 3rem !important;  }
  .pb-5,.py-5 {  padding-bottom: 3rem !important;  }
  .pl-5,.px-5 {  padding-left: 3rem !important;  }

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
    width: 200px; /* Ajusta el tamaño de la imagen */
    vertical-align: middle; /* Alinea la imagen con el texto */
  }
  .header-table .text {
    text-align: right;
    vertical-align: middle; /* Alinea el texto con la imagen */
  }
  .bg_blue{
    background-color: #005183;
    padding: 8px 5px;
  }
  .details, .products, .client { width: 100%; margin-bottom: 15px; }
  .text-right { text-align: right; }
  table{  width: 100%;  }
  .products, .client, .bancostable {
    width: 100%;
    border-collapse: collapse; /* Elimina los espacios entre celdas */
    margin-bottom: 15px;
  }
  /* Estilo para hacer las filas striped */
  .products thead tr, .client thead tr {
    background-color: #005183; /* Color de fondo del encabezado */
    color: white;
  }
  /* Estilos de las celdas del encabezado */
  .products th {
    padding: 8px;
    border: none; /* Sin borde para el encabezado */
  }
  /* Alternancia de colores en filas excepto las últimas tres */
  .products tbody tr:not(:nth-last-child(-n+3)):nth-child(odd) {
      background-color: #f9f9f9;
  }
  .products tbody tr:not(:nth-last-child(-n+3)):nth-child(even) {
      background-color: #ffffff;
  }
  .bancostable tbody tr:not(:nth-last-child(-n+1)):nth-child(odd) {
      background-color: #f9f9f9;
  }
  .bancostable tbody tr:not(:nth-last-child(-n+1)):nth-child(even) {
      background-color: #ffffff;
  }
  /* Estilos de las celdas del cuerpo */
  .products td {
    padding: 8px;
    border: none; /* Sin borde en las celdas del cuerpo */
  }
  .prod-img{
    width:60px;
  }
  /* Estilos para el footer */
  .footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 60px;
    background-color: #005183;
    color: white;
    text-align: center;
    /*font-size: 14px;*/
  }

  /* Estilos para la tabla en el footer */
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

  /* Alineación vertical del texto */
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
  .bancos{
    font-size: 10px;
    line-height : 10px;
  }
  .bancos table{
    width: 30%;
  }

</style>
</head>
<body>
  <table>
    <tbody>
      <tr>
        <td>
          @php $date = Carbon::parse($pedido->created_at); @endphp
          {{$date}}
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>2</td>
        <td>21101902</td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <table class="header-table mb-5">
    <tr>
      <!-- Imagen a la izquierda -->
      <td>
        @if($opciones->datos == 2 || $opciones->datos == 3)
          <img  class="" src="{{asset('img/EpporLogoC.png')}}" alt="EpporLogo">
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

  <h1 class="text-right fnt30 fntB fnt_dblue">PEDIDO #{{ $pedido->folio }}</h1>
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
  <table class="products mb-4">
      <thead class="bg_blue">
        <tr>
          <th class="text-uppercase fnt14">Ctd</th>
          <th class="text-uppercase fnt14">Descripcion</th>
          <th class="text-uppercase fnt14">Imagen</th>
          <th class="text-uppercase fnt14">Precio</th>
          <th class="text-uppercase fnt14">&nbsp; importe &nbsp;</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pedido->productos as $producto)
        <tr class="prodrows">
          <td class="fnt12 fnt_black">{{ $producto->pivot->cantidad }}</td>
          <td class="fnt12 fnt_black">{{ $producto->nombre }}</td>
          <td class="fnt12 fnt_black"><img class="prod-img" src="{{ asset('img/prods/'.$producto->codigo.'.jpg') }}" alt=""> </td>
          <td class="fnt12 fnt_black">${{ number_format($producto->pivot->precio, 2) }}</td>
          <td class="fnt12 fnt_black">${{ number_format($producto->pivot->total, 2) }}</td>
        </tr>
        @endforeach
        @if($pedido->factura == 1)
        <tr class="totals-row">
          <td></td>
          <td></td>
          <td></td>
          <td class="bg_blue fntB fnt_white">SUBTOTAL</td>
          <td class="fntB fnt_dblue">${{ number_format($pedido->subtotal, 2) }}</td>
        </tr>
        <tr class="totals-row">
          <td></td>
          <td></td>
          <td></td>
          <td class="bg_blue fntB fnt_white">IVA</td>
          <td class="fntB fnt_dblue">${{ number_format($pedido->iva, 2) }}</td>
        </tr>
        @endif
        <tr class="totals-row">
          <td></td>
          <td></td>
          <td></td>
          <td class="bg_blue fntB fnt_white">TOTAL</td>
          <td class="fntB fnt_dblue">${{ number_format($pedido->total, 2) }}</td>
        </tr>
      </tbody>
  </table>




  </div>




  <div class="terms pt-3">
    <h2 class="fnt_lgrey fnt20">Terminos y condiciones</h2>

    <p class="fnt9 fnt_lgrey"><strong>.-Vigencia de Precios:</strong> Este precio es válido durante 30 días desde la emisión del pedido. Pasado este plazo, el precio puede ajustarse si no se ha realizado un anticipo.</p>

    <p class="fnt9 fnt_lgrey"><strong>.-Envíos por Paquetería:</strong> Nuestra responsabilidad termina al entregar el pedido a la empresa de paquetería. El riesgo de envío pasa al cliente en este punto.</p>

    <p class="fnt9 fnt_lgrey"><strong>.-Horarios de Entrega:</strong> Recolección en nuestras instalaciones: Lunes a viernes de 9:00 am a 1:00 pm y de 3:00 pm a 5:00 pm; sábados de 9:00 am a 1:00 pm.</p>

    <p class="fnt9 fnt_lgrey"><strong>.-Almacenaje:</strong> El cliente cuenta con 30 días para recoger el material una vez notificado. Después de este plazo, se aplicará un cargo por almacenaje.</p>

    <p class="fnt9 fnt_lgrey"><strong>.-Garantía:</strong> La garantía cubre únicamente defectos de fabricación dentro de los primeros 6 meses, y se requerirá evidencia fotográfica y recibo para hacerla válida.</p>

  </div>
  <!-- Footer que estará siempre al pie de página -->
  <div class="footer pt-2">
    <table>
      <tbody>
        <tr class="pb-1">
          <td>
            <img class="footer_img" src="{{ asset('img/icons/wa_icon.png') }}" alt="WhatsApp">
            <span class="footer_text">33-36-70-69-91</span>
          </td>
          <td class="fntB fnt18">
            <img class="footer_img" src="{{ asset('img/icons/fb_icon.png') }}" alt="Facebook">&nbsp;<img class="footer_img" src="{{ asset('img/icons/ig_icon.png') }}" alt="Instagram">
            <span class="footer_text">eppormx</span>
          </td>
          <td class="fntB fnt18">
            <img class="footer_img" src="{{ asset('img/icons/wp_icon.png') }}" alt="Sitio web">
             <span class="footer_text">www.eppor.com.mx</span>
           </td>
        </tr>
      </tbody>
      </table>
      <span class="fnt16 pb-2 fnt_white"> Lauro Badillo Diaz #420 Col. Brisas de Chapala, Tlaquepaque, Jalisco. C.P. 45590</span >
  </div>
</body>
</html>


