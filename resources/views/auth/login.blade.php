@extends('layouts.base', ['title' => 'Log In'])

@section('body-attribute')
class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100"
@endsection

@section('content')
<div class="home-btn d-none d-sm-block position-absolute top-0 end-0 m-3">
    <a href="{{ route ('public.home') }}"><i class="fas fa-home h2 text-white"></i></a>
</div>

<div class="account-pages w-100 mt-5 mb-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mb-0">

                    <div class="card-body p-4">


                        <div class="account-box">
                            <div class="account-logo-box text-center">
                                <div class="text-center">
                                    <a href="{{ route ('public.home') }}">
                                        <img src="{{ asset('img/EpporLogoC.png') }}" class="mx-auto d-block img-fluid" alt="Eppor">
                                    </a>
                                </div>
                                <h5 class="text-uppercase mb-1 mt-4 fw-semibold">Eppor Nexus</h5>
                                <p class="mb-0">Sistema Administrativo</p>
                            </div>

                            <div class="account-content mt-4">
                                <form method="POST" action="{{ route('login') }}" class="form-horizontal">

                                    @csrf

                                    @if (sizeof($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                    <p class="text-danger mb-3">{{ $error }}</p>
                                    @endforeach
                                    @endif

                                    <div class="form-group row">
                                        <div class="col-12">
                                            <label for="emailaddress">Correo Eléctronico</label>
                                            <input class="form-control" type="email" name="email" id="emailaddress" value="" required=""
                                                placeholder="Ingresa tu correo">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">
                                          {{--
                                            <a href="#" class="text-muted float-end"><small>Forgot
                                                    your password?</small></a>
                                                    --}}
                                            <label for="password">Contraseña</label>
                                            <input class="form-control" type="password" required="" name="password" id="password"
                                                placeholder="Ingresa tu contraseña">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-12">

                                            <div class="checkbox form-checkbox-success">
                                                <input id="remember" type="checkbox" checked="">
                                                <label for="remember">
                                                    Recuerdame
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group row text-center mt-2">
                                        <div class="col-12">
                                            <button
                                                class="btn btn-md btn-block btn-primary waves-effect waves-light w-100"
                                                type="submit">Entrar</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
@endsection