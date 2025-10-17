@extends('layouts.public')

@section('title', 'Piso porcicola')
@section('section', 'pisos')

@section('content')
<!-- Carrusel full width -->
<header class="mt-5 mt-md-0">
  <div class="bg-carousel h-banner">
    <div class="container">
      <div class="row">
        <div class="col-8">
          <h3 class="mt-5 mb-0 title-car">Equipos para la industria</h3>
          <h1 class="mb-0 subtitle-car tintw"><span class="tintb">Piso porcicola plástico</span>.</h1>
        </div>
        <div class="col-4">
          <img src="img/industrial/vaca.png" class="img-fluid float" alt="">
        </div>
      </div>
    </div>
  </div>
</header>

<div class="bg-pig">
  <div class="container">
    <div class="row py-5 justify-content-center">
      <p class="text-nos my-5">En Grupo EPPOR, somos expertos en el diseño y fabricación de mobiliario urbano que transforma espacios públicos y privados en áreas funcionales, estéticas y duraderas. Cada pieza está elaborada con materiales de la más alta calidad, como acero inoxidable y acero al carbono, para garantizar su resistencia ante el uso diario y las condiciones climáticas más exigentes. Desde bancas hasta estructuras personalizadas, ofrecemos soluciones adaptadas a las necesidades específicas de nuestros clientes, apoyando el desarrollo de entornos que fomenten la convivencia y la sostenibilidad.</p>
      <div class="col-9 col-md-10 ">
        <h1 class="tintb"><b>slats plásticos</b></h1>
        <div class="card-ind pt-0 mt-5">
          <img src="{{ asset('img/agro/plastico.png') }}" class="img-fluid text-center img-border" alt="">
          <div class="row p-4">
            <div class="col-md-4">
              <img class="rounded img-fluid"  src="{{ asset('img/pisoporcicola_1.jpg') }}" alt="Piso Porcicola Malla">
            </div>
            <div class="col-md-8">
              <p class="p-4">Nuestros pisos de plástico para instalaciones agropecuarias están diseñados para brindar
                comodidad, seguridad y durabilidad en áreas de maternidad y destete. Fabricados con materiales de alta
                calidad, estos pisos ofrecen resistencia y facilidad de mantenimiento, siendo una solución práctica y
                eficiente para sus instalaciones.</p>
              </div>
              <div class="col-md-8 pt-4">
                <p>Una de las principales ventajas de nuestros pisos es su diseño con cejillas de armado, que garantizan
                  una unión fuerte y segura entre piezas, evitando que se suelten y provoquen accidentes. Además, contamos
                  con configuraciones que permiten combinar nuestros pisos plásticos con slats de fierro vaciado en áreas
                  de maternidad, creando zonas completamente reforzadas y seguras para la cerda, sin comprometer la
                  comodidad de los lechones.</p>
                </div>
                <div class="col-md-4 pt-4">
                  <img class="rounded img-fluid"  src="{{ asset('img/pisoporcicola_2.jpg') }}" alt="Piso Porcicola Malla">
                </div>
                <div class="col-md-4 pt-4">
                  <img class="rounded img-fluid"  src="{{ asset('img/pisoporcicola_1.jpg') }}" alt="Piso Porcicola Malla">
                </div>
                <div class="col-md-8 pt-4">
                  <p>
                    •<b>Cejillas de armado:</b> Unión fuerte y segura para evitar desprendimientos.
                    •<b>Diseño modular:</b> Facilita la instalación y configuración según sus necesidades. <br>
                    •<b>Combinación personalizada:</b> Permite integrar slats de fierro vaciado para áreas reforzadas en maternidad. <br>
                    •<b>Durabilidad y resistencia:</b> Superficie antideslizante y resistente a la corrosión para mayor seguridad. <br>
                    •<b>Fácil mantenimiento:</b> Limpieza eficiente que reduce costos operativos. <br>
                  </p>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    @endsection