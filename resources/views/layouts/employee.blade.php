
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Sistema de Inventario</title>

    <!-- Font Awesome Icons -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('styles')

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <div class="brand-image img-circle elevation-3 ml-3 mt-1">
                <span class="fa fa-toolbox"></span>
            </div>
            <span class="brand-text font-weight-lighter ">Gestor de productos</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <span class="fa fa-user user-img text-white ml-1 mt-1"></span>
                </div>
                <div class="info">
                    <a href="#" class="d-block">
                        {{ Auth::user()->name }}
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    {{--    Home         --}}
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Inicio
                            </p>
                        </a>
                    </li>
                    {{--    Spares        --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fas fa-tools"></i>
                            <p>
                                Repuestos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('spares.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lista</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('spares.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Agregar repuesto</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--                    Users--}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fas fa-user"></i>
                            <p>
                                Usuarios
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('users.user.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lista</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('users.user.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Agregar usuario</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--    Clientes      --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fas fa-user-friends"></i>
                            <p>
                                Clientes
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('clients.client.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lista</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('clients.client.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Agregar cliente</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--    Providers       --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fas fa-user-tie"></i>
                            <p>
                                Proveedores
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('providers.provider.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lista</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('providers.provider.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Agregar proveedor</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--    Purchases       --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fas fa-shopping-bag"></i>
                            <p>
                                Compras
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('purchases.purchase.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lista</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('purchases.purchase.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Agregar compra</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--    Stores      --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fas fa-store"></i>
                            <p>
                                Tiendas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('stores.store.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lista</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('stores.store.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Agregar tienda</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--    Sales       --}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fas fa-money-bill"></i>
                            <p>
                                Ventas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('sales.sale.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lista</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('sales.sale.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Agregar Venta</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--    Stats       --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-area"></i>
                            <p>
                                Estadisticas
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            @yield('page-title')
                        </h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <!-- Default to the left -->
        <strong>Copyright &copy; {{ now()->year  }}. <a href="#">MARS</a></strong>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


</body>
</html>
<script src="{{asset('js/app.js')}}"></script>
@yield('scripts')

