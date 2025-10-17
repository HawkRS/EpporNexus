@extends('layouts.public')

@section('title', 'Inicio')
@section('section', 'Home')

@section('content')

<!-- Carrusel full width -->
<header class="mt-5 mt-md-0">
    <div id="carouselExampleAutoplaying" class="carousel slide bg-carousel">
        <div class="carousel-inner" style="overflow: visible;">
            <div class="carousel-item active">
                <div class="row h-100">
                    <!-- Primera columna con texto centrado -->
                    <div class="col-12 col-md-7 d-flex align-items-center justify-content-center">
                        <div class="text-start d-flex flex-column">
                            <h3 class="mb-0 title-car">Equipos que transforman</h3>
                            <h1 class="mb-0 subtitle-car tintw"><span class="tintb">PROYECTOS</span>.</h1>
                            <a href="" class="btn_mas">Ver más</a>
                        </div>
                    </div>

                    <!-- Segunda columna con imagen desbordada -->
                    <div class=" col-md-5 position-relative d-none d-md-flex align-items-end">
                        <img src="{{ asset('img/banner-agro.png') }}" class="w-100" alt="..."
                            style="position: absolute; bottom: -50px; left: 0;">
                    </div>
                </div>
            </div>

            <!-- Repite para otros carousel-items -->
            <div class="carousel-item">
                <div class="row h-100">
                    <div class="col-md-7 d-flex align-items-center justify-content-center">
                        <div class="text-start d-flex flex-column">
                            <h3 class="mb-0 title-car">Equipos que transforman</h3>
                            <h1 class="mb-0 subtitle-car tintw"><span class="tintb">PROYECTOS</span>.</h1>
                            <a href="" class="btn_mas">Ver más</a>
                        </div>
                    </div>
                    <div class="col-md-5 position-relative">
                        <img src="{{ asset('img/banner-agro.png') }}" class="w-100" alt="..."
                            style="position: absolute; bottom: -50px; left: 0;">
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="row h-100">
                    <div class="col-md-7 d-flex align-items-center justify-content-center">
                        <div class="text-start d-flex flex-column">
                            <h3 class="mb-0 title-car">Equipos que transforman</h3>
                            <h1 class="mb-0 subtitle-car tintw"><span class="tintb">PROYECTOS</span>.</h1>
                            <a href="" class="btn_mas">Ver más</a>
                        </div>
                    </div>
                    <div class="col-md-5 position-relative d-flex align-items-end">
                        <img src="{{ asset('img/banner-agro.png') }}" class="w-100" alt="..."
                            style="position: absolute; bottom: -50px; left: 0;">
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</header>

<div class="container pb-5" id="">
    <div class="row ">
        <h1 class="title-sec text-center my-5"><span>Nuestros</span> Productos</h1>
        <div class="col-6 col-md-3 text-center p-3">
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

        <div class="col-6 col-md-3 text-center p-3">
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

        <div class="col-6 col-md-3 text-center p-3">
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

        <div class="col-6 col-md-3 text-center p-3">
            <div class="card-eppor bg-card-2">
                <div class="gradient-overlay">
                    <div class="text-overlay text-start">
                        <p class="title-card m-0">Cocina</p>
                        <p class="text-card p-0">Mesa Fabricado en acero<br>
                        inoxidable cortada con<br>
                        laser y pulido.
                        </p>
                        <div class="box-icons">
                            <img src="{{ asset('img/icons/icn-cocina.png') }}" alt="">
                            <a href="{{ route('public.cocina') }}" class="btn_arrow">mas</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<div class="nosotros">
    <div class="container">
        <div class="row p-4">
            <div class="col-12 col-md-6 pe-0">
                <img src="img/img-nosotros.png" class="img-fluid" alt="">
            </div>
            <div class="col-12 col-md-6 box-white p-5">
                    <p class="sub-nos">Acerca de
                    <span>Nosotros</span></p>
                    <p class="text-nos">Con más de <strong>40 años de experiencia</strong> y trayectoria en el <strong>mercado mexicano</strong>, buscamos consolidarnos como líder en la
                      fabricación de equipo industrial de acero inoxidable de alta calidad.
                    </p>
                    <p class="text-nos">No solo fabricamos; <strong>ofrecemos soluciones duraderas y accesibles</strong> que transforman la operación en diversos sectores.
                       Nuestro compromiso se centra en la excelencia de la ingeniería y en la utilización exclusiva de acero inoxidable para garantizar la
                       máxima higiene, resistencia a la corrosión y una vida útil superior.
                    </p>

                    <p class="text-nos">Diseñamos y fabricamos a la medida para cubrir las necesidades específicas de nuestros clientes en áreas clave,
                      incluyendo el sector <strong>agropecuario</strong> (con equipos especializados), <strong>mobiliario urbano</strong> (piezas resistentes y funcionales), y
                      <strong>cocinas industriales</strong> (mobiliario que cumple con estrictas normas sanitarias). Esta especialización nos permite ofrecer el
                      <strong>equipo industrial</strong> ideal para su proyecto.
    </p>
                    <p class="text-nos"><br> <b>¡LA CALIDAD ES NUESTRA MARCA!</b></p>
            </div>
        </div>
    </div>
</div>



<div class="container">
<h1 class="title-sec text-center my-5"><span>Galeria de</span> Proyectos</h1>
<div class="scroll-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <img src="{{ asset('img/galeria/gal2.png') }}" class="img-fluid gallery-img mb-2" alt="Imagen 1">
                    <img src="{{ asset('img/galeria/gal1.png') }}" class="img-fluid gallery-img" alt="Imagen 2">
                </div>
                <div class="col-3">
                    <img src="{{ asset('img/galeria/gal4.png') }}" class="img-fluid gallery-img mb-1" alt="Imagen 3">
                    <img src="{{ asset('img/galeria/gal3.png') }}" class="img-fluid gallery-img" alt="Imagen 4">
                </div>
                <div class="col-3">
                    <img src="{{ asset('img/galeria/gal5.png') }}" class="img-fluid gallery-img mb-2" alt="Imagen 5">
                    <img src="{{ asset('img/galeria/gal6.png') }}" class="img-fluid gallery-img" alt="Imagen 6">
                </div>
                <div class="col-3">
                    <img src="{{ asset('img/galeria/gal7.png') }}" class="img-fluid gallery-img mb-2" alt="Imagen 7">
                    <img src="{{ asset('img/galeria/gal8.png') }}" class="img-fluid gallery-img mb-2" alt="Imagen 8">
                    <img src="{{ asset('img/galeria/gal9.png') }}" class="img-fluid gallery-img" alt="Imagen 8">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
            <div class="col-3">
            <img src="{{ asset('img/galeria/gal13.png') }}" class="img-fluid gallery-img mb-2" alt="Imagen 7">
            <img src="{{ asset('img/galeria/gal15.png') }}" class="img-fluid gallery-img mb-2" alt="Imagen 8">

                </div>
                <div class="col-3">
                <img src="{{ asset('img/galeria/gal10.png') }}" class="img-fluid gallery-img mb-2" alt="Imagen 7">
                    <img src="{{ asset('img/galeria/gal11.png') }}" class="img-fluid gallery-img mb-2" alt="Imagen 8">
                    <img src="{{ asset('img/galeria/gal12.png') }}" class="img-fluid gallery-img" alt="Imagen 8">
                </div>
                <div class="col-3">
                    <img src="{{ asset('img/galeria/gal16.png') }}" class="img-fluid gallery-img mb-2" alt="Imagen 5">
                    <img src="{{ asset('img/galeria/gal14.png') }}" class="img-fluid gallery-img" alt="Imagen 6">
                </div>
                <div class="col-3">
                    <img src="{{ asset('img/galeria/gal17.png') }}" class="img-fluid gallery-img mb-1" alt="Imagen 7">
                    <img src="{{ asset('img/galeria/gal20.png') }}" class="img-fluid gallery-img" alt="Imagen 8">
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Lightbox (fuera del contenedor principal para ser global) -->
<div class="lightbox" id="lightbox">
<span class="close" id="close">&times;</span>
<img class="lightbox-img" src="" alt="">
<div class="lightbox-nav">
    <button class="prev" id="prev">&lt;</button>
    <button class="next" id="next">&gt;</button>
</div>
</div>

<!--TESTIMONIOS-->

<div class="bg-testimonios mt-5 pb-5">
<h1 class="title-test text-center pt-4 mb-5"><span>Nuestros</span> Clientes</h1>


 <div class="container">
    <div class="row">
        <div class="col-sm-4 col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Google</h5>
                    <p class="card-text">
                    Muy buen servicio en la entrega de los productos y de buena calidad, envíos seguros, llegan a tiempo y rápido. En lo personal recomiendo a la empresa EPPOR.
                    </p>
                    <img src="img/estrellas.png" alt="">
                    <h5 class="card-subtitle mt-2">Rafael Perez</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-12">
        <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Facebook</h5>
                    <p class="card-text">
                    De los mejores equipos!.
                    </p>
                    <img src="img/estrellas.png" alt="">
                    <h5 class="card-subtitle mt-2">Martin Mojica</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-12">
        <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Mercado Libre</h5>
                    <p class="card-text">
                    Excelentes productos y muy buena la atención en todo.
                    </p>
                    <img src="img/estrellas.png" alt="">
                    <h5 class="card-subtitle mt-2">Jesus González</h5>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<a href="https://wa.me/523336706991?text=Buen+día,%0AEscribo+desde+el+sitio+web,+me+gustaria+más+información.%0ASaludos." class="btn_cotizar my-5">cotiza tu <span>Proyecto</span></a>

<div class="bg-gray">
<div class="container py-5">

    <div class="row">
        <div class="col-12 col-md-6">
        <h1 class="title-sec text-start my-5"><span>Descubre nuestra</span> Ubicación</h1>
        <p class="phone">33-36-70-69-91</p>
        <p class="edif mb-5">Lauro Badillo Diaz #420, colonia Brisas de Chapala<br>
            San Pedro Tlaquepaque, Jalisco, C.P. 45590
        </p>
        </div>
        <div class="col-12 col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3734.3813345111344!2d-103.3285502890881!3d20.613307780854534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sLauro%20Badillo%20Diaz%20%23420%2C%20colonia%20Brisas%20de%20Chapala!5e0!3m2!1ses-419!2smx!4v1732252797313!5m2!1ses-419!2smx" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
</div>

@endsection