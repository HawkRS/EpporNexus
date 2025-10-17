@extends('layouts.public')

@section('title', 'Cocinas industriales')
@section('section', 'urbano')

@section('content')
<!-- Carrusel full width -->
<header class="mt-5 mt-md-0">
  <div class="bg-carousel h-banner">
    <div class="container">
      <div class="row">
        <div class="col-8">
          <h3 class="mt-5 mb-0 title-car">Equipos para la industria</h3>
          <h1 class="mb-0 subtitle-car tintw"><span class="tintb">Fabricación de Equipo de Cocina Personalizado para Profesionales</span>.</h1>
        </div>
        <div class="col-4">
          <img src="{{asset('img/industrial/vaca.png')}}" class="img-fluid float" alt="">
        </div>
      </div>
    </div>
  </div>
</header>

<div class="bg-gray">
  <div class="container">
    <div class="row py-5 justify-content-center">
      <p class="text-nos my-5">En Grupo EPPOR, entendemos que cada cocina es única y que su equipo debe adaptarse a
        las necesidades de quienes trabajan en ella. Por eso, fabricamos equipo de cocina industrial y comercial a
        medida, utilizando acero inoxidable de grado alimenticio para garantizar durabilidad, higiene y facilidad de
        limpieza. Ya sea para un restaurante de alta gama, un comedor industrial o un proyecto gastronómico emergente,
        nuestras soluciones están diseñadas para maximizar la eficiencia, la seguridad y el rendimiento en cualquier
        entorno culinario.</p>
        <div class="col-9 col-md-10 ">
          <div class="card-ind pt-0 mt-5">
            <img src="{{ asset('img/agro/alambre.png') }}" class="img-fluid text-center img-border" alt="">
            <div class="row p-4">
              <div class="col-md-4">
                <img class="rounded img-fluid"  src="{{ asset('img/industrial/ind5.jpg') }}" alt="Piso Porcicola Malla">
              </div>
              <div class="col-md-8">
                <p class="p-4">Nuestro equipo de cocina se destaca por su diseño ergonómico, pensado para mejorar la
                  productividad del personal y facilitar la organización de los espacios. Además, cada producto es
                  fabricado con materiales resistentes a altas temperaturas, humedad y uso intensivo, garantizando una
                  larga vida útil. Al trabajar directamente con nuestros clientes, aseguramos que cada pieza cumpla con
                  sus especificaciones exactas, desde dimensiones hasta acabados, ofreciendo soluciones completamente
                  personalizadas.</p>
                </div>
                <div class="col-md-8 pt-4">
                  <p>Gracias a sus amplias aberturas, nuestros pisos minimizan la acumulación de desechos y facilitan su limpieza,
                    reduciendo costos operativos tanto en tiempo como en recursos. Además, la superficie superior es planchada para
                    proporcionar mayor comodidad a los animales y un drenaje eficiente de líquidos, asegurando instalaciones más
                    higiénicas y funcionales.</p>
                  </div>
                  <div class="col-md-4 pt-4">
                    <img class="rounded img-fluid"  src="{{ asset('img/pisoporcicola_2.jpg') }}" alt="Piso Porcicola Malla">
                  </div>
                </div>

                <div class="container pb-5" id="">
                  <h1 class="title-sec text-center my-5"><span>Algunos de nuestros</span> Trabajos</h1>
                  <div class="row ">

                    <div class="col-6 col-md-4 text-center p-3">
                      <div class="card-ind">
                        <img src="{{ asset('img/urbano/urb5.jpg') }}" class="img-fluid" alt="">
                        <hr>
                        <p>Mesas de trabajo</p>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 text-center p-3">
                      <div class="card-ind">
                        <img src="{{ asset('img/urbano/urb2.jpg') }}" class="img-fluid" alt="">
                        <hr>
                        <p>Repisas y gabinetes</p>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 text-center p-3">
                      <div class="card-ind">
                        <img src="{{ asset('img/urbano/urb3.jpg') }}" class="img-fluid" alt="">
                        <hr>
                        <p>Salamandras</p>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 text-center p-3">
                      <div class="card-ind">
                        <img src="{{ asset('img/urbano/urb+.jpg') }}" class="img-fluid" alt="">
                        <hr>
                        <p>Asadores</p>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 text-center p-3">
                      <div class="card-ind">
                        <img src="{{ asset('img/urbano/urb1.jpg') }}" class="img-fluid" alt="">
                        <hr>
                        <p>Revolvedoras</p>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 text-center p-3">
                      <div class="card-ind">
                        <img src="{{ asset('img/urbano/urb4.jpg') }}" class="img-fluid" alt="">
                        <hr>
                        <p>Mesas de comedor</p>
                      </div>
                    </div>


                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container pt-5">

        <div class="pb-3">
          <h2 class="title-sec text-center">Transforma tu cocina con equipos diseñados a tu medida.</h2>
          <a href="https://wa.me/523336706991?text=Buen+día,%0AEscribo+desde+el+sitio+web,+me+gustaria+más+información.%0ASaludos." class="btn_cotizar my-5">
            cotiza tu <span>Proyecto</span>
          </a>
        </div>
        <div class="pb-5">
          <h4 class="title-sec text-center">También ofrecemos soluciones en equipo de cocina industrial y mobiliario urbano.</h4>
          <div class="row">
            <div class="col-6 col-md-4 text-center p-3">
              <div class="card-eppor bg-card-1">
                <div class="gradient-overlay">
                  <div class="text-overlay text-start">
                    <p class="title-card m-0">Agropecuario</p>
                    <p class="text-card p-0">Mesa Fabricado en acero<br>
                      inoxidable cortada con<br>
                      laser y pulido.
                    </p>
                    <div class="box-icons">
                      <img src="{{ asset('img/icons/icn-agro.png') }}" alt="">
                      <a href="{{ route('public.agropecuario') }}" class="btn_arrow">mas</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 text-center p-3">
              <div class="card-eppor bg-card-4">
                <div class="gradient-overlay">
                  <div class="text-overlay text-start">
                    <p class="title-card m-0">Industrial</p>
                    <p class="text-card p-0">Mesa Fabricada en acero<br>
                      inoxiadble conrata con <br>
                      laser y pulida.
                    </p>
                    <div class="box-icons">
                      <img src="{{ asset('img/icons/icn-ind.png') }}" alt="">
                      <a href="{{ route('public.industrial') }}" class="btn_arrow">mas</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-6 col-md-4 text-center p-3">
              <div class="card-eppor bg-card-3">
                <div class="gradient-overlay">
                  <div class="text-overlay text-start">
                    <p class="title-card m-0">Urbano</p>
                    <p class="text-card p-0">Mesa Fabricada en acero<br>
                      inoxiadble conrata con <br>
                      laser y pulida.
                    </p>
                    <div class="box-icons">
                      <img src="{{ asset('img/icons/icn-urb.png') }}" alt="">
                      <a href="{{ route('public.urbano') }}" class="btn_arrow">mas</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection