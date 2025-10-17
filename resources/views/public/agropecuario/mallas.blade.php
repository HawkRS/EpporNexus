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
                  <h1 class="mb-0 subtitle-car tintw"><span class="tintb">Piso porcicola galvanizado</span>.</h1>
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
        <h1 class="tintb"><b>Alambre Galvanizado</b></h1>
        <div class="card-ind pt-0 mt-5">
          <img src="{{ asset('img/agro/alambre.png') }}" class="img-fluid text-center img-border" alt="">
          <div class="row p-4">
            <div class="col-md-4">
              <img class="rounded img-fluid"  src="{{ asset('img/pisoporcicola_1.jpg') }}" alt="Piso Porcicola Malla">
            </div>
            <div class="col-md-8">
              <p class="p-4">Nuestros pisos de alambre galvanizado son la opción ideal para sus instalaciones agropecuarias.
                Diseñados con materiales de alta calidad y una fabricación en tejido galvanizado, estos pisos ofrecen durabilidad,
                resistencia y flexibilidad para garantizar el bienestar de los animales y la facilidad de mantenimiento.</p>
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
            <div class="col-md-4 pt-4">
              <img class="rounded img-fluid"  src="{{ asset('img/pisoporcicola_1.jpg') }}" alt="Piso Porcicola Malla">
            </div>
            <div class="col-md-8 pt-4">
              <p><b>•Fácil limpieza:</b> Diseño que evita la acumulación de excremento entre las ranuras.<br>
              <b>•Bajo mantenimiento:</b> Aberturas amplias que reducen el tiempo y costo de limpieza.<br>
              <b>•Mayor comodidad:</b> Superficie planchada para un soporte cómodo y seguro.<br>
              <b>•Larga duración:</b> Alambre galvanizado de alta resistencia con una vida útil superior a 15 años.</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection