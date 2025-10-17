@extends('layouts.public')

@section('title', 'Jaulas')
@section('section', 'JaulasSection')

@section('content')

<main class="col-12">

        <section class="row justify-content-center ">
          <div class="col-12 pd-0">
            <div class="hero-image" style="background-image: url('img/jaulasporcicolas.jpg')">
              <div class="hero-text">

                <h1 class="fntB fnt_white">JAULAS</h1>

              </div>
            </div>

          </div>
        </section>

        <section class="row justify-content-center pt-5 pb-5 hbg-light">
          <div class="col-12 col-md-8 pt-3 pb-3">

            <div class="row justify-content-center pt-3">

              <div class="col-12 col-lg-4 pt-4 ">
                  <div class="prod_bx">
                    <img class=" img-fluid mx-auto d-block pt-4 pb-2" style="max-width:200px" src="{{ asset('img/Jaula_Gestacion_Solera.png') }}" alt="Jaula Gestacion Solera">
                  </div>
                  <div class="collapse prod_det_box pt-2 pb-2 " id="jaulaGestacion">
                    <ul style="margin-bottom:0px">
                      <li class="fnt16 fnt_white pt-2 pr-1 pl-1"> Fabricada en angulo y solera.</li>
                      <li class="fnt16 fnt_white pt-2 pr-1 pl-1"> Varilla de 1/2 pulgada</li>
                      <li class="fnt16 fnt_white pt-2 pr-1 pl-1"> Galvanizada por inmersion en caliente</li>
                    </ul>
                    <div class="text-center pt-3 pb-3">
                      <a href="{{ asset('pdf/JaulaGestacionsSolera.pdf') }}" target="_blank" class="btn_detalles">Más</a>
                    </div>
                  </div>

                  <a data-toggle="collapse" href="#jaulaGestacion" role="button" aria-expanded="false" aria-controls="jaulaGestacion">
                  <div class="prod_desc_bx text-center pt-1 pb-1">
                      <h2 class="fnt16 fnt_white ">GESTACION SOLERA</h2>
                  </div>
                </a>
              </div>


              <div class="col-12 col-lg-4 pt-4 ">
                  <div class="prod_bx">
                    <img class=" img-fluid mx-auto d-block pt-4 pb-2" style="max-width:200px" src="{{ asset('img/Jaula_Gestacion_Tubular.png') }}" alt="Jaula Gestacion Tubular">
                  </div>
                  <div class="collapse prod_det_box pt-2 pb-2" id="jaulaGestPintada">
                    <ul style="margin-bottom:0px">
                      <li class="fnt16 fnt_white pt-2"> Fabricada en tubular de 3/4" ced 30.</li>
                      <li class="fnt16 fnt_white pt-2"> Tubo bajante de alimento</li>
                      <li class="fnt16 fnt_white pt-2"> Se entrega pintada o galvanizada por inmersion en caliente</li>
                    </ul>
                    <div class="text-center pt-3 pb-3">
                      <a href="{{ asset('pdf/JaulaGestacionTubular.pdf') }}" target="_blank" class="btn_detalles">Más</a>
                    </div>
                  </div>
                  <a data-toggle="collapse" href="#jaulaGestPintada" role="button" aria-expanded="false" aria-controls="jaulaGestPintada">
                  <div class="prod_desc_bx text-center pt-1 pb-1">
                      <h2 class="fnt16 fnt_white ">GESTACION TUBULAR</h2>
                  </div>
                </a>
              </div>

              <div class="col-12 col-lg-4 pt-4 ">
                  <div class="prod_bx">
                    <img class=" img-fluid mx-auto d-block pt-4 pb-2" style="max-width:200px" src="{{ asset('img/Jaula_Maternidad.png') }}" alt="Jaula Maternidad">
                  </div>
                  <div class="collapse prod_det_box pt-2 pb-2" id="jaulaMaternidad">
                    <ul style="margin-bottom:0px">
                      <li class="fnt16 fnt_white pt-2"> Fabricada con tubo de 1 pulgada ced-30.</li>
                      <li class="fnt16 fnt_white pt-2"> Cuenta con comedero tipo cangilón.</li>
                      <li class="fnt16 fnt_white pt-2"> Galvanizada por inmersion en caliente.</li>
                    </ul>
                    <div class="text-center pt-3 pb-3">
                      <a href="{{ asset('pdf/JaulaMaternidad.pdf') }}" target="_blank" class="btn_detalles">Más</a>
                    </div>
                  </div>
                  <a data-toggle="collapse" href="#jaulaMaternidad" role="button" aria-expanded="false" aria-controls="jaulaMaternidad">
                  <div class="prod_desc_bx text-center pt-1 pb-1">
                      <h2 class="fnt16 fnt_white ">MATERNIDAD GALVANIZADA</h2>
                  </div>
                </a>
              </div>

            </div>

          </div>
        </section>



      </main>

@endsection
