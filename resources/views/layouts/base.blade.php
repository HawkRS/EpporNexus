<!DOCTYPE html>
<html lang="es_mx" data-sidenav-size="default" data-bs-theme="light" data-menu-color="brand" data-topbar-color="lgith" data-layout-mode="fluid">

<head>
    @include('layouts.partials.title-meta')

    @include('layouts.partials.head-css')

    @vite(['resources/js/head.js'])
    @vite(['node_modules/sweetalert2/dist/sweetalert2.min.css'])
</head>

<body @yield('body-attribute')>

    @yield('content')

    @include('layouts.partials.footer-scripts')

</body>

</html>