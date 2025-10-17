@extends('layouts.public')

@section('title', 'Inicio')
@section('section', 'Home')

@section('content')

  <!-- Carrusel full width -->
    <header class="mt-5 mt-md-0 mb-5">
        <div class="bg-carousel h-banner">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                    <h3 class="mt-5 mb-0 title-car">Equipos para la industria</h3>
                    <h1 class="mb-0 subtitle-car tintw"><span class="tintb">Jaulas</span>.</h1>
                    </div>
                    <div class="col-4">
                        <img src="img/industrial/vaca.png" class="img-fluid float" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-9 align-self-center">
                <p class="text-nos my-5">En Grupo EPPOR, somos expertos en el diseño y fabricación de mobiliario urbano que transforma espacios públicos y privados en áreas funcionales, estéticas y duraderas. Cada pieza está elaborada con materiales de la más alta calidad, como acero inoxidable y acero al carbono, para garantizar su resistencia ante el uso diario y las condiciones climáticas más exigentes. Desde bancas hasta estructuras personalizadas, ofrecemos soluciones adaptadas a las necesidades específicas de nuestros clientes, apoyando el desarrollo de entornos que fomenten la convivencia y la sostenibilidad.</p>
            </div>
        </div>
    </div>

    <div class="bg-gray">
    <div class="container pb-5" id="">
        <h1 class="title-sec text-center my-5"><span>Nuestros</span> Jaulas</h1>
        <div class="row ">    

            @foreach($productos as $producto)
            <div class="col-6 col-md-3 text-center p-3">
                <div class="card-ind">
                    <img src="{{ asset('img/prods/'.$producto->codigo.'.jpg') }}" class="img-fluid" alt="">
                    <hr>
                    <p>{{$producto->nombre}}</p>
                </div>
            </div> 
            @endforeach
            

        </div>

    </div>
    </div>

  

<a href="" class="btn_cotizar my-5">
    cotiza tu <span>Proyecto</span>
</a>

@endsection