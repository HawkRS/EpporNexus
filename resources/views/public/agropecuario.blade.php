@extends('layouts.public')

@section('title', 'Inicio')
@section('section', 'Home')

@section('content')

<!-- Carrusel full width -->
<header class="mt-5 mt-md-0 mb-0">
    <div class="bg-carousel h-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-8 order-sm-1 order-2">
                <h3 class="mt-sm-5 mt-0 mb-0 title-car">Equipos para la industria</h3>
                <h1 class="mb-sm-0 mb-5 subtitle-car tintw"><span class="tintb">Agropecuaria</span>.</h1>
                </div>
                <div class="col-12 col-sm-4 order-sm-2 order-1">
                    <img src="img/agro/baner-agro.png" class="img-fluid float" alt="">
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row text-center pe-0">
        <div class="col-12 col-sm-6 order-sm-1 order-2 align-self-center">
            <p class="text-nos my-5 p-4">En Grupo EPPOR, con 40 años de experiencia, transformamos las necesidades del
                campo en soluciones agropecuarias confiables y duraderas. Desde implementos para porcicultura hasta
                equipos personalizados para <b>ganado bovino, ovino, equino y avícola, fabricamos herramientas adaptadas
                a tu producción.</b> Confía en nosotros como tu aliado estratégico para llevar eficiencia y bienestar animal
                a otro nivel.</p>
        </div>
        <div class="col-12 col-sm-6 order-sm-2 order-1 p-0">
            <img src="img/agro/img-agro.png" class="img-fluid w-100" alt="">
        </div>
    </div>
</div>

<div class="bg-gray">
<div class="container pb-5" id="">
    <div class="row justify-content-center">
        <h1 class="title-sec text-center my-5"><span>Nuestros</span> Productos</h1>
        <div class="col-12 col-md-4 text-center">
            <div class="card-ind pt-0 mb-5">
                <img src="img/agro/Comederos.jpg" class="img-fluid  img-border" alt="">
                <p class="p-2"><b>Comederos:</b> eficientes que reducen el desperdicio de alimento, ideales para destete, engorda y más.</p>
                <hr>
                <p class="px-4"><b>Comederos</b><a href="{{ route('public.comederos') }}" class="btn_arrow-a">mas</a></p>
            </div>
        </div>

                <div class="col-12 col-md-4 text-center">
            <div class="card-ind pt-0 mb-5">
                <img src="img/agro/Piso.jpg" class="img-fluid  img-border" alt="">
                <p class="p-2"><b>Herramientas esenciales para el manejo diario:</b> crayones, cortacolas, arreadores, bebederos, aretadores, jeringas y más, diseñados para facilitar el trabajo en tus instalaciones.</p>
                <hr>
                <p class="px-4"><b>Piso porcicola galvanizado</b><a href="{{ route('public.mallas') }}" class="btn_arrow-a">mas</a></p>
            </div>
        </div>

        <div class="col-12 col-md-4 text-center">
            <div class="card-ind pt-0 ">
                <img src="img/agro/Jaulas.jpg" class="img-fluid  img-border" alt="">
                <p class="p-2"><b>Jaulas funcionales</b> y seguras para maternidad, gestación y destete, adaptadas a las necesidades de cada etapa productiva.</p>
                <hr>
                <p class="px-4"><b>Jaulas</b><a href="{{ route('public.jaulas') }}" class="btn_arrow-a">mas</a></p>
            </div>
        </div>

        <div class="col-12 col-md-4 text-center">
            <div class="card-ind pt-0 mb-5">
                <img src="img/agro/mesas.jpg" class="img-fluid  img-border" alt="">
                <p class="p-2"><b>Herramientas esenciales para el manejo diario:</b> crayones, cortacolas, arreadores, bebederos, aretadores, jeringas y más, diseñados para facilitar el trabajo en tus instalaciones.</p>
                <hr>
                <p class="px-4"><b>Piso plástico</b><a href="{{ route('public.slats') }}" class="btn_arrow-a">mas</a></p>
            </div>
        </div>

        <div class="col-12 col-md-4 text-center">
            <div class="card-ind pt-0 mb-5">
                <img src="img/agro/Implementos.jpg" class="img-fluid  img-border" alt="">
                <p class="p-2"><b>Herramientas esenciales para el manejo diario:</b> crayones, cortacolas, arreadores, bebederos, aretadores, jeringas y más, diseñados para facilitar el trabajo en tus instalaciones.</p>
                <hr>
                <p class="px-4"><b>Implementos</b><a href="{{ route('public.implementos') }}" class="btn_arrow-a">mas</a></p>
            </div>
        </div>


    </div>
</div>
</div>


<div class="bg-pig">
    <div class="container">
        <div class="row py-5 justify-content-center">
            <h1 class="text-center  my-5"><b>Pisos Porcicolas</b></h1>
        <div class="col-9 col-md-10 ">
        <h1 class="tintb"><b>Alambre Galvanizado</b></h1>
            <div class="card-ind pt-0 mt-5">
                <img src="img/agro/alambre.png" class="img-fluid text-center img-border" alt="">
                <p class="p-4">
                Nuestros pisos de alambre galvanizado son la opción ideal para sus instalaciones agropecuarias. Diseñados con materiales de alta calidad y una fabricación en tejido galvanizado, estos pisos ofrecen durabilidad, resistencia y flexibilidad para garantizar el bienestar de los animales y la facilidad de mantenimiento.
                <br><br>
                Gracias a sus amplias aberturas, nuestros pisos minimizan la acumulación de desechos y facilitan su limpieza, reduciendo costos operativos tanto en tiempo como en recursos. Además, la superficie superior es planchada para proporcionar mayor comodidad a los animales y un drenaje eficiente de líquidos, asegurando instalaciones más higiénicas y funcionales.
                <br><br>
                <b>Ventajas:</b><br>
                <b>•Fácil limpieza:</b> Diseño que evita la acumulación de excremento entre las ranuras.<br>
                <b>•Bajo mantenimiento:</b> Aberturas amplias que reducen el tiempo y costo de limpieza.<br>
                <b>•Mayor comodidad:</b> Superficie planchada para un soporte cómodo y seguro.<br>
                <b>•Larga duración:</b> Alambre galvanizado de alta resistencia con una vida útil superior a 15 años.<br>
                </p>

            </div>
        </div>

        <div class="col-9 col-md-10 mt-5">
        <h1 class="tintb mb-5"><b>Plástico</b></h1>
            <div class="card-ind pt-0 mb-5">
                <img src="img/agro/plastico.png" class="img-fluid text-center img-border" alt="">
                <p class="p-4">
                Nuestros pisos de plástico para instalaciones agropecuarias están diseñados para brindar comodidad, seguridad y durabilidad en áreas de maternidad y destete. Fabricados con materiales de alta calidad, estos pisos ofrecen resistencia y facilidad de mantenimiento, siendo una solución práctica y eficiente para sus instalaciones.<br><br>
Una de las principales ventajas de nuestros pisos es su diseño con cejillas de armado, que garantizan una unión fuerte y segura entre piezas, evitando que se suelten y provoquen accidentes. Además, contamos con configuraciones que permiten combinar nuestros pisos plásticos con slats de fierro vaciado en áreas de maternidad, creando zonas completamente reforzadas y seguras para la cerda, sin comprometer la comodidad de los lechones.
<br><br>
<b>Ventajas:</b><br>
<b>•	Cejillas de armado:</b> Unión fuerte y segura para evitar desprendimientos.<br>
<b>•	Diseño modular:</b> Facilita la instalación y configuración según sus necesidades.<br>
<b>•	Combinación personalizada:</b> Permite integrar slats de fierro vaciado para áreas reforzadas en maternidad.<br>
<b>•	Durabilidad y resistencia:</b> Superficie antideslizante y resistente a la corrosión para mayor seguridad.<br>
<b>•	Fácil mantenimiento:</b> Limpieza eficiente que reduce costos operativos.<br>
Estos pisos son la elección ideal para productores que buscan una solución confiable, higiénica y adaptable a las exigencias de la producción porcina.

                </p>

            </div>
        </div>


        </div>
    </div>
</div>



<a href="https://wa.me/523336706991?text=Buen+día,%0AEscribo+desde+el+sitio+web,+me+gustaria+más+información.%0ASaludos." class="btn_cotizar my-5">
cotiza tu <span>Proyecto</span>
</a>

@endsection