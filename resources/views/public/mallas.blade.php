@extends('layouts.public')

@section('title', 'Piso Porcicola')
@section('section', 'PisoSection')

@section('content')

<main class="col-12">

  <section class="row justify-content-center ">
    <div class="col-12 pd-0">
      <div class="hero-image" style="background-image: url('img/pisoporcicola.jpg')">
        <div class="hero-text">

          <h1 class="fntB fnt_white">PISO PORCICOLA</h1>

        </div>
      </div>

    </div>
  </section>

  <section class="row justify-content-center pt-5 pb-5 hbg-light">
    <div class="col-12 col-md-8 pt-3 pb-3">

      <div class="row justify-content-center pt-2"  >
        <div class="col-10" style="border-bottom:2px solid #002e4d !important;" >
          <h2 class="fnt_blueD">Piso de malla porcícola</h2>
          <h3 class="fnt22 fnt_blueL pt-2">Fabricado en alambre galvanizado este piso es la mejor opción para sus instalaciones</h3>
          <p class="fnt_black fnt18">Nuestros pisos son fabricados con alambre galvanizado tejido, esto proporciona varias ventajas,
            su material y fabricación lo hacen duradero y resistente mientras mantiene una flexibilidad que es más cómoda para el animal
            así como más efectiva evitando la acumulación de desechos.</p>
          <img class=" img-fluid mx-auto d-block pb-2"  src="img/mallaporcicola.jpg" alt="Malla porcicola cerdos">
          <p class="fnt_black fnt18">La amplitud de sus aberturas además minimizar la acumulación de excremento son mucho más fáciles de
            limpiar reduciendo costos de mantenimiento, tanto en personal como en recursos. Este material tiene un planchado en la parte
            superior de modo que proporciona una superficie plana y cómoda para sus animales, a su vez facilitando el drenaje de líquidos.</p>
        </div>
      </div>



      <div class="row justify-content-center pt-4">
        <div class="col-xs-12 col-sm-4  order-2 order-sm-1 pt-2">

          <p class="fnt16 fntL pt-1"><i class="fnt_blue fas fa-circle"></i> &nbsp; <span class="fnt_blueL fntB">Limpieza:</span> <span>Su diseño evita almacenamiento de excremento entre ranuras</span> </p>
          <p class="fnt16 fntL pt-1"><i class="fnt_blue fas fa-circle"></i> &nbsp; <span class="fnt_blueL fntB">Mantenimiento:</span> <span>Fácil limpieza por sus aberturas mas amplias con un menor costo de mantenimiento</span> </p>
          <p class="fnt16 fntL pt-1"><i class="fnt_blue fas fa-circle"></i> &nbsp; <span class="fnt_blueL fntB">Comodidad:</span> <span>Alambre planchado en la superficie para mayor comodidad</span> </p>
        </div>

        <div class="col-xs-12 col-sm-6 order-1 order-sm-2 ">
          <img class=" img-fluid mx-auto d-block "  src="{{ asset('img/pisoporcicola_1.jpg') }}" alt="Piso Porcicola Malla">
        </div>
      </div>

      <div class="row justify-content-left pt-5">
        <div class="col-xs-12 col-sm-6">
          <img class=" img-fluid mx-auto d-block "  src="{{ asset('img/pisoporcicola_2.jpg') }}" alt="Piso Porcicola Malla">
        </div>

        <div class="col-xs-12 col-sm-4 pt-2">
          <p class="fnt16 fntL pt-1"><i class="fnt_blue fas fa-circle"></i> &nbsp; <span class="fnt_blueL fntB">Duración:</span> <span>El alambre galvanizado es de alta duración garantizando mas de 15 años su funcionamiento</span> </p>
          <p class="fnt16 fntL pt-1"><i class="fnt_blue fas fa-circle"></i> &nbsp; <span class="fnt_blueL fntB">Ajuste:</span> <span>Fabricado a la medida de sus necesidades y en los siguientes calibres:</span> </p>
          <p><img class="d-block"   src="{{ asset('img/MallaCalibres.svg') }}" alt="Piso Porcicola Malla"></p>
        </div>
      </div>
      <!--div class="row">
        <div class="col-12">
          <div class="fb-like" data-href="https://eppor.mx/dev-eppor/index.html" data-width="" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
        </div>
      </div-->


    </div>
  </section>



</main>

@endsection
