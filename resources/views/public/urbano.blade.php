@extends('layouts.public')

@section('title', 'Mobiliario Urbano')
@section('section', 'urbano')

@section('content')
<!-- Carrusel full width -->
  <header class="mt-5 mt-md-0">
      <div class="bg-carousel h-banner">
          <div class="container">
              <div class="row">
                  <div class="col-8">
                  <h3 class="mt-5 mb-0 title-car">Equipos para la industria</h3>
                  <h1 class="mb-0 subtitle-car tintw"><span class="tintb">Diseño y Fabricación de Mobiliario Urbano Personalizado</span>.</h1>
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
      <p class="text-nos my-5">En Grupo EPPOR, somos expertos en el diseño y fabricación de mobiliario urbano que
        transforma espacios públicos y privados en áreas funcionales, estéticas y duraderas. Cada pieza está
        elaborada con materiales de la más alta calidad, como acero inoxidable y acero al carbono, para garantizar
        su resistencia ante el uso diario y las condiciones climáticas más exigentes. Desde bancas hasta estructuras
        personalizadas, ofrecemos soluciones adaptadas a las necesidades específicas de nuestros clientes, apoyando
        el desarrollo de entornos que fomenten la convivencia y la sostenibilidad.</p>
      <div class="col-9 col-md-10 ">
        <div class="card-ind pt-0 mt-5">
          <img src="{{ asset('img/agro/alambre.png') }}" class="img-fluid text-center img-border" alt="">
          <div class="row p-4">
            <div class="col-md-4">
              <img class="rounded img-fluid"  src="{{ asset('img/industrial/ind5.jpg') }}" alt="Piso Porcicola Malla">
            </div>
            <div class="col-md-8">
              <p class="p-4">El mobiliario urbano no solo debe ser funcional, sino también integrarse armoniosamente con
              su entorno. Por eso, trabajamos junto a nuestros clientes para crear diseños que reflejen la identidad de sus espacios.
              Además, nuestra experiencia nos permite fabricar productos que requieren materiales duraderos y resistentes al clima.</p>
            </div>
            <div class="col-md-8 pt-4">
              <p>En la fabricación de mobiliario urbano, cada detalle cuenta. Por eso en Grupo EPPOR cuidamos cada etapa
                del proceso, desde el diseño inicial hasta la instalación final. Trabajamos con arquitectos, urbanistas,
                desarrolladores y gobiernos municipales para crear elementos que aporten valor estético y funcional a parques,
                calles, centros educativos, deportivos o recreativos. Nuestros productos no solo son resistentes, también
                son personalizables en materiales, colores y acabados, permitiendo una integración armoniosa en cualquier
                entorno urbano.</p>
            </div>
            <div class="col-md-4 pt-4">
              <img class="rounded img-fluid"  src="{{ asset('img/pisoporcicola_2.jpg') }}" alt="Piso Porcicola Malla">
            </div>
            <div class="col-md-8 pt-4">
              <p>Ya sea que se trate de mobiliario urbano para proyectos públicos o desarrollos privados, nuestros clientes
                eligen Grupo EPPOR por la calidad de los materiales y la durabilidad que ofrecemos. Utilizamos acero inoxidable,
                acero al carbono y recubrimientos anticorrosivos que prolongan la vida útil de cada estructura. Además,
                implementamos procesos de fabricación que cumplen con los estándares más exigentes del mercado, asegurando la
                funcionalidad y seguridad de cada componente.</p>
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
                    <p>Bancas urbanas</p>
                  </div>
                </div>
                <div class="col-6 col-md-4 text-center p-3">
                  <div class="card-ind">
                    <img src="{{ asset('img/urbano/urb2.jpg') }}" class="img-fluid" alt="">
                    <hr>
                    <p>Juegos infantiles</p>
                  </div>
                </div>
                <div class="col-6 col-md-4 text-center p-3">
                  <div class="card-ind">
                    <img src="{{ asset('img/urbano/urb3.jpg') }}" class="img-fluid" alt="">
                    <hr>
                    <p>Cestos de basura</p>
                  </div>
                </div>
                <div class="col-6 col-md-4 text-center p-3">
                  <div class="card-ind">
                    <img src="{{ asset('img/urbano/urb+.jpg') }}" class="img-fluid" alt="">
                    <hr>
                    <p>Señalética</p>
                  </div>
                </div>
                <div class="col-6 col-md-4 text-center p-3">
                  <div class="card-ind">
                    <img src="{{ asset('img/urbano/urb1.jpg') }}" class="img-fluid" alt="">
                    <hr>
                    <p>Equipo deportivo</p>
                  </div>
                </div>
                <div class="col-6 col-md-4 text-center p-3">
                  <div class="card-ind">
                    <img src="{{ asset('img/urbano/urb4.jpg') }}" class="img-fluid" alt="">
                    <hr>
                    <p>Estructuras personalizadas</p>
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