@extends('layouts.public')

@section('title', 'Comederos')
@section('section', 'ComederosSection')

@section('content')

<main class="col-12">

        <section class="row justify-content-center ">
          <div class="col-12 pd-0">
            <div class="hero-image" style="background-image: url('img/comederos.jpg')">
              <div class="hero-text">

                <h1 class="fntB fnt_white">COMEDEROS PARA CERDOS</h1>

              </div>
            </div>

          </div>
        </section>

        <section class="row justify-content-center pt-5 hbg-light text-center">
          <div class="col-8">
            <h2 class="fntB fnt_blue">Comederos para todas las etapas su ganado</h2>

            <p>Contamos con comederos para cada una de las etapas de tu ganado porcino, desde maternidad hasta engorda; Nuestros comederos estan fabricados en
            acero inoxidable para mayor duración, A su vez nuestros comederos no cuentan con tornillos evitando atascamientos</p>
          </div>
        </section>

        <section class="row justify-content-center pt-5 pb-5 hbg-light">
          <div class="col-12 col-md-8 pt-3 pb-3">

            <div class="row justify-content-center pt-3">

              <div class="col-12 col-lg-4 pt-4 ">
                <a data-toggle="collapse" href="#comederoEngorda" role="button" aria-expanded="false" aria-controls="comederoEngorda">
                  <div class="prod_bx">
                    <img class=" img-fluid mx-auto d-block pt-4 pb-2"  src="{{ asset('img/comedero_engorda.jpg') }}" alt="Comedero engorda">
                  </div>
                  <div class="collapse prod_det_box pt-2 pb-2 " id="comederoEngorda">
                    <ul style="margin-bottom:0px">
                      <li class="fnt16 fnt_white pt-2 pr-1 pl-1"> Comederos de 4, 5 y 6 bocas tipo sencillo y doble.</li>
                      <li class="fnt16 fnt_white pt-2 pr-1 pl-1"> Capacidad de alimento desde 150kg hasta 250kg</li>
                      <li class="fnt16 fnt_white pt-2 pr-1 pl-1"> Fabricados en acero inoxidable o acero al carbón</li>
                    </ul>
                    <div class="text-center pt-3 pb-3">
                      <a href="{{ asset('pdf/ComederoEngorda.pdf') }}"  target="_blank" class="btn_detalles">Más</a>
                    </div>
                  </div>

                  <div class="prod_desc_bx text-center pt-1 pb-1">
                      <h3 class="fnt16 fnt_white ">COMEDERO DE ENGORDA</h3>
                  </div>
                </a>
              </div>


              <div class="col-12 col-lg-4 pt-4 ">
                <a data-toggle="collapse" href="#comederoDestete" role="button" aria-expanded="false" aria-controls="comederoDestete">
                  <div class="prod_bx">
                    <img class=" img-fluid mx-auto d-block pt-4 pb-2"  src="{{ asset('img/comedero_destete.jpg') }}" alt="Comedero destete">
                  </div>
                  <div class="collapse prod_det_box pt-2 pb-2" id="comederoDestete">
                    <ul style="margin-bottom:0px">
                      <li class="fnt16 fnt_white pt-2"> Comederos de 5, 6 y 7 bocas tipo sencillo y doble.</li>
                      <li class="fnt16 fnt_white pt-2"> Capacidad de alimento desde 100kg hasta 180kg</li>
                      <li class="fnt16 fnt_white pt-2"> Fabricados en acero inoxidable o acero al carbon</li>
                    </ul>
                    <div class="text-center pt-3 pb-3">
                      <a href="{{ asset('pdf/ComederoDestete.pdf') }}"  target="_blank" class="btn_detalles">Más</a>
                    </div>
                  </div>
                  <div class="prod_desc_bx text-center pt-1 pb-1">
                      <h3 class="fnt16 fnt_white ">COMEDERO PARA DESTETE</h3>
                  </div>
                </a>
              </div>

              <div class="col-12 col-lg-4 pt-4 ">
                <a data-toggle="collapse" href="#comederoRedondo" role="button" aria-expanded="false" aria-controls="comederoRedondo">
                  <div class="prod_bx">
                    <img class=" img-fluid mx-auto d-block pt-4 pb-2"  src="{{ asset('img/comedero_redondo.jpg') }}" alt="Comedero Redondo">
                  </div>
                  <div class="collapse prod_det_box pt-2 pb-2" id="comederoRedondo">
                    <ul style="margin-bottom:0px">
                      <li class="fnt16 fnt_white pt-2"> Bebederos para que el cerdo mezcle su alimento.</li>
                      <li class="fnt16 fnt_white pt-2"> Capacidad de 180kg en alimentos peletizados.</li>
                      <li class="fnt16 fnt_white pt-2"> Fabricados solo en acero inoxidable.</li>
                    </ul>
                    <div class="text-center pt-3 pb-3">
                      <a href="{{ asset('pdf/ComederoRedondo.pdf') }}"  target="_blank" class="btn_detalles">Más</a>
                    </div>
                  </div>
                  <div class="prod_desc_bx text-center pt-1 pb-1">
                      <h3 class="fnt16 fnt_white ">COMEDERO REDONDO</h3>
                  </div>
                </a>
              </div>

            </div>

            <div class="row justify-content-center pt-5">

              <div class="col-12 col-lg-4 pt-4 ">
                <a data-toggle="collapse" href="#comederoLechon" role="button" aria-expanded="false" aria-controls="comederoLechon">
                  <div class="prod_bx">
                    <img class=" img-fluid mx-auto d-block pt-4 pb-2" style="max-width:300px" src="{{ asset('img/comedero_lechon.jpg') }}" alt="Comedero Lechon">
                  </div>
                  <div class="collapse prod_det_box pt-2 pb-2" id="comederoLechon">
                    <ul style="margin-bottom:0px">
                      <li class="fnt16 fnt_white pt-2"> Bordes libres de filos para mayor seguridad.</li>
                      <li class="fnt16 fnt_white pt-2"> Gancho para sujetarse a nuestro piso de malla. </li>
                      <li class="fnt16 fnt_white pt-2"> Fabricado en acero inoxidable tipo plato.</li>
                    </ul>
                    <div class="text-center pt-3 pb-3">
                      <a href="{{ asset('pdf/ComederoLechon.pdf') }}"  target="_blank" class="btn_detalles">Más</a>
                    </div>
                  </div>
                  <div class="prod_desc_bx text-center pt-1 pb-1">
                      <h3 class="fnt16 fnt_white ">COMEDERO PARA LECHON</h3>
                  </div>
                </a>
              </div>

              <div class="col-12 col-lg-4 pt-4 ">
                <a data-toggle="collapse" href="#comederoCagilon" role="button" aria-expanded="false" aria-controls="comederoCagilon">
                  <div class="prod_bx">
                    <img class=" img-fluid mx-auto d-block pt-4 pb-2" style="max-width:300px" src="{{ asset('img/comedero_cerdacagilon.jpg') }}" alt="Comedero Tipo Cagilon">
                  </div>
                  <div class="collapse prod_det_box pt-2 pb-2" id="comederoCagilon">
                    <ul style="margin-bottom:0px">
                      <li class="fnt16 fnt_white pt-2"> Bebederos para que el cerdo mezcle su alimento.</li>
                      <li class="fnt16 fnt_white pt-2"> Capacidad de 180kg en alimentos peletizados.</li>
                      <li class="fnt16 fnt_white pt-2"> Fabricados solo en acero inoxidable.</li>
                    </ul>
                    <div class="text-center pt-3 pb-3">
                      <a href="{{ asset('pdf/ComederoHembraCagilon.pdf') }}"  target="_blank" class="btn_detalles">Más</a>
                    </div>
                  </div>
                  <div class="prod_desc_bx text-center pt-1 pb-1">
                      <h3 class="fnt16 fnt_white ">COMEDERO PARA HEMBRA TIPO CANGILON</h3>
                  </div>
                </a>
              </div>

              <div class="col-12 col-lg-4 pt-4 ">
                <a data-toggle="collapse" href="#comederoHembra" role="button" aria-expanded="false" aria-controls="comederoHembra">
                  <div class="prod_bx">
                    <img class=" img-fluid mx-auto d-block pt-4 pb-2" style="max-width:300px" src="{{ asset('img/comedero_cerda.jpg') }}" alt="Comedero Cerda">
                  </div>
                  <div class="collapse prod_det_box pt-2 pb-2" id="comederoHembra">
                    <ul style="margin-bottom:0px">
                      <li class="fnt16 fnt_white pt-2"> Doblez al frente para que la cerda no tire el alimento.</li>
                      <li class="fnt16 fnt_white pt-2"> Su forma evita que la cerda deje residuos de alimento.</li>
                      <li class="fnt16 fnt_white pt-2"> Fabricados en acero inoxidable o acero al carbón.</li>
                    </ul>
                    <div class="text-center pt-3 pb-3">
                      <a href="{{ asset('pdf/comederoHembra.pdf') }}"  target="_blank" class="btn_detalles">Más</a>
                    </div>
                  </div>
                  <div class="prod_desc_bx text-center pt-1 pb-1">
                      <h3 class="fnt16 fnt_white ">COMEDERO PARA HEMBRA TIPO TOLVA</h3>
                  </div>
                </a>
              </div>

            </div>

          </div>
        </section>



      </main>

@endsection
