<!-- Sidenav Menu Start -->
<div class="sidenav-menu ">

    <!-- Brand Logo -->
    <a href="{{ route ('admin.dashboard') }}" class="logo">
        <span class="logo-light">
            <span class="logo-lg"><img src="{{ asset('img/logo-light.png') }}" alt="logo"></span>
            <span class="logo-sm"><img src="{{ asset('img/logo-sm.png') }}" alt="small logo"></span>
        </span>

        <span class="logo-dark">
            <span class="logo-lg"><img src="{{ asset('img/logo-dark.png') }}" alt="dark logo"></span>
            <span class="logo-sm"><img src="{{ asset('img/logo-sm.png') }}" alt="small logo"></span>
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <button class="button-sm-hover">
        <i class="ti ti-circle align-middle"></i>
    </button>

    <!-- Full Sidebar Menu Close Button -->
    <button class="button-close-fullsidebar">
        <i class="ti ti-x align-middle"></i>
    </button>

    <div data-simplebar>

        <!--- Sidenav Menu -->
        <ul class="side-nav">
            <li class="side-nav-title">Menu</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDashboard" aria-expanded="false" aria-controls="sidebarDashboard" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="airplay"></i></span>
                    <span class="menu-text"> Inicio </span>
                    {{--<span class="badge bg-success rounded-pill">2</span>--}}
                </a>
                <div class="collapse" id="sidebarDashboard">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route ('admin.dashboard') }}" class="side-nav-link">
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarAdmin" aria-expanded="false" aria-controls="sidebarAdmin" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="cog"></i></span>
                    <span class="menu-text"> Administrativo </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarAdmin">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                                <span class="menu-text">Datos bancarios</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('cliente.index') }}" class="side-nav-link">
                                <span class="menu-text">Clientes</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('provee.index') }}" class="side-nav-link">
                                <span class="menu-text">Proveedores</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('movimientos.index') }}" class="side-nav-link">
                                <span class="menu-text">Caja</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('tareas.index') }}" class="side-nav-link">
                                <span class="menu-text">Tareas</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarConta" aria-expanded="false" aria-controls="sidebarConta" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="landmark"></i></span>
                    <span class="menu-text"> Contabilidad </span>
                    <?php use Carbon\Carbon; $fecha = Carbon::now('America/Mexico_City'); //dd($fecha->year)?>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarConta">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('conta.show', ['rfc' => 'GOMC631007NC2', 'year' =>$fecha->year]) }}" class="side-nav-link">
                                <span class="menu-text">GOMC631007NC2</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('conta.show', ['rfc' => 'GOHC9010197I0', 'year' =>$fecha->year]) }}" class="side-nav-link">
                                <span class="menu-text">GOHC9010197I0</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('imss.index') }}" class="side-nav-link">
                                <span class="menu-text">Pagos Imss</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('isn.index') }}" class="side-nav-link">
                                <span class="menu-text">Pagos ISN</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarVentas" aria-expanded="false" aria-controls="sidebarVentas" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="shopping-cart"></i></span>
                    <span class="menu-text"> Ventas </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarVentas">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('cotizacion.index') }}" class="side-nav-link">
                                <span class="menu-text">Cotizaciones</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('pedidos.index') }}" class="side-nav-link">
                                <span class="menu-text">Pedidos</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">Pagos</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPersonal" aria-expanded="false" aria-controls="sidebarPersonal" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="users-round"></i></span>
                    <span class="menu-text"> Personal </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPersonal">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('employees.list') }}" class="side-nav-link">
                                <span class="menu-text">Empleados</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('employees.list') }}" class="side-nav-link">
                                <span class="menu-text">Nomina</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="#" class="side-nav-link">
                                <span class="menu-text">Vacaciones y prestamos</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarInventarios" aria-expanded="false" aria-controls="sidebarInventarios" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="boxes"></i></span>
                    <span class="menu-text"> Inventarios </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarInventarios">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a href="{{ route('product.list') }}" class="side-nav-link">
                                <span class="menu-text">Productos</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ route('product.list') }}" class="side-nav-link">
                                <span class="menu-text">Materiales</span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{route('ferreteria.index')}}" class="side-nav-link">
                                <span class="menu-text">Ferreteria</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            {{--
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false" aria-controls="sidebarMultiLevel" class="side-nav-link">
                    <span class="menu-icon"><i data-lucide="folder-plus"></i></span>
                    <span class="menu-text"> Multi Level </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMultiLevel">
                    <ul class="sub-menu">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false" aria-controls="sidebarSecondLevel" class="side-nav-link">
                                <span class="menu-text"> Second Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="javascript: void(0);" class="side-nav-link">
                                            <span class="menu-text">Item 1</span>
                                        </a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a href="javascript: void(0);" class="side-nav-link">
                                            <span class="menu-text">Item 2</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel" class="side-nav-link">
                                <span class="menu-text"> Third Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarThirdLevel">
                                <ul class="sub-menu">
                                    <li class="side-nav-item">
                                        <a href="javascript: void(0);" class="side-nav-link">Item 1</a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false" aria-controls="sidebarFourthLevel" class="side-nav-link">
                                            <span class="menu-text"> Item 2 </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarFourthLevel">
                                            <ul class="sub-menu">
                                                <li class="side-nav-item">
                                                    <a href="javascript: void(0);" class="side-nav-link">
                                                        <span class="menu-text">Item 2.1</span>
                                                    </a>
                                                </li>
                                                <li class="side-nav-item">
                                                    <a href="javascript: void(0);" class="side-nav-link">
                                                        <span class="menu-text">Item 2.2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            --}}
        </ul>

        <div class="clearfix"></div>
    </div>
</div>
<!-- Sidenav Menu End -->
