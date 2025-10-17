@extends('layouts.public')

@section('title', 'Industrial')
@section('section', 'industrial')

@section('content')
<!-- Carrusel full width -->
  <header class="mt-5 mt-md-0">
      <div class="bg-carousel h-banner">
          <div class="container">
              <div class="row">
                  <div class="col-8">
                  <h3 class="mt-5 mb-0 title-car">Equipos para la industria</h3>
                  <h1 class="mb-0 subtitle-car tintw"><span class="tintb">Fabricación de Equipo Industrial Personalizado</span>.</h1>
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
      <p class="text-nos my-5">Con más de cuatro décadas de experiencia, en Grupo EPPOR nos especializamos en la fabricación
        de equipos industriales personalizados para una amplia gama de aplicaciones. Sabemos que cada industria tiene
        requerimientos únicos, por lo que trabajamos de la mano con nuestros clientes para diseñar y construir soluciones a
        medida que optimicen sus procesos, mejoren la productividad y reduzcan costos operativos. Desde tanques de almacenamiento
        hasta bandas transportadoras, cada pieza es fabricada con materiales de alta calidad y bajo estrictos controles de
        calidad para asegurar su rendimiento y durabilidad.</p>
      <div class="col-9 col-md-10 ">
        <div class="card-ind pt-0 mt-5">
          <img src="{{ asset('img/agro/alambre.png') }}" class="img-fluid text-center img-border" alt="">
          <div class="row p-4">
            <div class="col-md-4">
              <img class="rounded img-fluid"  src="{{ asset('img/industrial/ind5.jpg') }}" alt="Piso Porcicola Malla">
            </div>
            <div class="col-md-8">
              <p class="p-4">Nuestro enfoque en la personalización nos permite ofrecer equipos que se integran perfectamente
                en las operaciones de nuestros clientes. Además, utilizamos tecnología avanzada en nuestros procesos de
                manufactura para garantizar la precisión y la fiabilidad de cada producto. Ya sea que necesites un tanque
                con características específicas o un sistema de transporte adaptado a tu línea de producción, estamos aquí
                para convertir tus ideas en soluciones tangibles que impulsen tu negocio hacia el éxito</p>
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

                <div class="col-6 col-md-3 text-center p-3">
                  <div class="card-ind">
                    <img src="{{ asset('img/industrial/ind2.jpg') }}" class="img-fluid" alt="">
                    <hr>
                    <p>Mesas de trabajo</p>
                  </div>
                </div>
                <div class="col-6 col-md-3 text-center p-3">
                  <div class="card-ind">
                    <img src="{{ asset('img/industrial/ind6.jpg') }}" class="img-fluid" alt="">
                    <hr>
                    <p>Marmitas</p>
                  </div>
                </div>
                <div class="col-6 col-md-3 text-center p-3">
                  <div class="card-ind">
                    <img src="{{ asset('img/industrial/ind3.jpg') }}" class="img-fluid" alt="">
                    <hr>
                    <p>Tanques industriales</p>
                  </div>
                </div>
                <div class="col-6 col-md-3 text-center p-3">
                  <div class="card-ind">
                    <img src="{{ asset('img/industrial/ind5.jpg') }}" class="img-fluid" alt="">
                    <hr>
                    <p>Bancos especiales</p>
                  </div>
                </div>
                <div class="col-6 col-md-3 text-center p-3">
                  <div class="card-ind">
                    <img src="{{ asset('img/industrial/ind8.jpg') }}" class="img-fluid" alt="">
                    <hr>
                    <p>Bandas transportadoras</p>
                  </div>
                </div>
                <div class="col-6 col-md-3 text-center p-3">
                  <div class="card-ind">
                    <img src="{{ asset('img/industrial/ind10.jpg') }}" class="img-fluid" alt="">
                    <hr>
                    <p>Helicoidales</p>
                  </div>
                </div>
                <div class="col-6 col-md-3 text-center p-3">
                  <div class="card-ind">
                    <img src="{{ asset('img/industrial/ind1.jpg') }}" class="img-fluid" alt="">
                    <hr>
                    <p>Ciclones</p>
                  </div>
                </div>
                <div class="col-6 col-md-3 text-center p-3">
                  <div class="card-ind">
                    <img src="{{ asset('img/industrial/ind11.jpg') }}" class="img-fluid" alt="">
                    <hr>
                    <p>Planchas y pipas</p>
                  </div>
                </div>


              </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection