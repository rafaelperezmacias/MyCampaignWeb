<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyCampaign</title>
    @yield('css')
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Sidebar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home.index') }}" class="brand-link">
                <img src="{{ asset('img/logo3.png') }}" alt="MyCampaign Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">MyCampaign</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-header">MENU</li>
                        <li class="nav-item">
                            <a href="{{ route('home.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-house-user"></i>
                                <p>Inicio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @if ( isset($campaign) )
                                <a href="{{ route('campaigns.show', $campaign) }}" class="nav-link {{ isset($sidebar) && $sidebar == 'Campaing' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-flag"></i>
                                    <p>Campaña</p>
                                </a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('administrators.index') }}" class="nav-link {{ isset($sidebar) && $sidebar == 'Administrators' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>Administradores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sympathizers.index') }}" class="nav-link {{ isset($sidebar) && $sidebar == 'Sympathizers' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Simpatizantes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('volunteers.index') }}" class="nav-link {{ isset($sidebar) && $sidebar == 'Volunteers' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Voluntarios</p>
                            </a>
                        </li>
                        <!--
                        <li class="nav-header">LOGOUT</li>
                        <li class="nav-item">
                            <a href="../gallery.html" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>Cerrar sesión</p>
                            </a>
                        </li> -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        @yield('content')

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 0.19
            </div>
            <strong>Copyright &copy; 2022 RockyTheRock</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @yield('js')
</body>
</html>
