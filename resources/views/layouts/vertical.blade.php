<!DOCTYPE html>
<html lang="en" @yield('html_attribute')>


<head>
    @include('layouts.partials.title-meta')

    @include('layouts.partials.head-css')

    @vite(['resources/js/head.js', 'resources/js/config.js'])
</head> 

<body @yield('body_attribute')>
    <!-- Begin page -->
    <div class="wrapper">


        @include('layouts.partials.topbar')
        @include('layouts.partials.sidenav')
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="page-content">

            <div class="page-container">

                @yield('content')

            </div> <!-- container -->
            @include('layouts.partials.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    @include('layouts.partials.customizer')

    @include('layouts.partials.footer-scripts')


</body>

</html>