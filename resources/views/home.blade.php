<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-icons/bootstrap-icons.css') }}">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-primary navbar-dark elevation-3">
            <div class="container">
                <a href="../../index3.html" class="navbar-brand">
                    <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-dark fs-4">My Campaign</span>
                </a>
                <ul class="nav nav-pills p-2 ml-5 mr-5 w-100 nav-justified">
                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"
                            id="nav_list">Campañas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab" id="nav_add">Nueva
                            campaña</a></li>
                </ul>
                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2"
                                alt="User Image">
                            <span class="d-none d-md-inline">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                                    alt="User Image">
                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <a href="#" class="btn btn-default btn-flat float-right btn-block">Cerrar
                                    sesión</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="container">
                <section class="content-header"></section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content">
                                <!-- Primera TAB (Campañas frecuentes) -->
                                <div class="tab-pane active" id="tab_1">
                                    <h1>Bienvenido!</h1>
                                    @if (isset($campaign))
                                        <h4>Campaña actual <span class="description fs-5">{{ $campaign->name }} -
                                                {{ $campaign->party }}</span></h4>
                                        <div class="row">
                                            <div class="col-lg-4 col-12">
                                                <!-- small card -->
                                                <div class="small-box bg-gray">
                                                    <div class="inner">
                                                        <h3>{{ $campaign->volunteers_count }}</h3>

                                                        <p>Voluntario(s)</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-shopping-cart"></i>
                                                    </div>
                                                    <a href="{{ route('volunteers.index') }}" class="small-box-footer">
                                                        Ver detalles... <i class="fas fa-arrow-circle-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-12">
                                                <!-- small card -->
                                                <div class="small-box bg-success">
                                                    <div class="inner">
                                                        <h3>{{ $campaign->sympathizers_count }}</h3>

                                                        <p>Simpatizante(s)</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="ion ion-stats-bars"></i>
                                                    </div>
                                                    <a href="{{ route('sympathizers.index') }}" class="small-box-footer">
                                                        Ver detalles... <i class="fas fa-arrow-circle-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-12">
                                                <!-- small card -->
                                                <div class="small-box bg-warning">
                                                    <div class="inner">
                                                        <h3>{{ $campaign->administrators_count }}</h3>

                                                        <p>Administradores(s)</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-user-plus"></i>
                                                    </div>
                                                    <a href="{{ route('administrators.index') }}" class="small-box-footer">
                                                        Ver detalles... <i class="fas fa-arrow-circle-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    @endif
                                    <h1 class="mb-3">Frecuentes</h1>
                                    <div class="row row-cols-1 row-cols-md-4 g-4">
                                        @foreach ($firtsCampaigns as $campaign)
                                            <div class="col">
                                                <div class="card card-success h-90 elevation-2"
                                                    id="card{{ $loop->index }}">
                                                    <div class="card-header"></div>
                                                    <div class="card-body">
                                                        <p class="card-title font-weight-bold">{{ $campaign->name }}
                                                        </p>
                                                        <p class="card-text">{{ $campaign->party }}</p>
                                                        <p class="card-text"> {{ $campaign->start_date }} -
                                                            {{ $campaign->end_date }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <form action="{{ route('home.campaign') }}" method="POST"
                                                    id="form{{ $loop->index }}">
                                                    @csrf
                                                    <input type="hidden" name="campaign_id"
                                                        value="{{ $campaign->id }}">
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Sgunda TAB (Listado de campañas) -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h1>Listado de campañas</h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a class="btn btn-outline-primary pl-5 pr-5" id="btn_add">Agregar
                                                campaña</a>
                                        </div>
                                    </div>
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <table class="table table table-bordered table-striped" id="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Partido Político</th>
                                                        <th>Periodo</th>
                                                        <th>Accions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allCampaigns as $campaign)
                                                        <tr>
                                                            <td> {{ $campaign->name }} </td>
                                                            <td> {{ $campaign->party }} </td>
                                                            <td> {{ $campaign->start_date }} -
                                                                {{ $campaign->end_date }} </td>
                                                            <td class="text-center">
                                                                <form action="{{ route('home.campaign') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="campaign_id"
                                                                        value="{{ $campaign->id }}">
                                                                    <button type="submit"
                                                                        class="btn btn-outline-success btn-sm">
                                                                        Acceder <i
                                                                            class="fa fa-thin fa-arrow-right pl-2"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tercera TAB (Formulario de campañas) -->
                                <div class="tab-pane" id="tab_3">
                                    <div class="card card-primary mt-5 elevation-3">
                                        <div class="card-header">
                                            <div class="row fs-3 d-flex align-items-center">
                                                <h3 class="ml-3">Agregar nueva campaña</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form action=" {{ route('campaigns.store') }}" method="POST">
                                                @csrf
                                                <h6 class="d-flex @error('name') text-danger @enderror">Nombre</h6>
                                                <div class="form-group ">
                                                    <input type="text" name="name" id="name"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        placeholder="Ingrese el nombre de la campaña"
                                                        value="{{ old('name') ?? '' }}">
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <h6 class="d-flex @error('party') text-danger @enderror">Partido
                                                    político</h6>
                                                <div class="form-group ">
                                                    <input type="text" name="party" id="party"
                                                        class="form-control @error('party') is-invalid @enderror"
                                                        placeholder="Ingrese el nombre del partido político"
                                                        value="{{ old('party') ?? '' }}">
                                                    @error('party')
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h6 class="d-flex @error('start_date') text-danger @enderror">
                                                            Fecha de inicio de la campaña</h6>
                                                        <div class="form-group">
                                                            <input type="date" name="start_date" id="start_date"
                                                                class="form-control @error('start_date') is-invalid @enderror"
                                                                placeholder="Ingrese el nombre"
                                                                value="{{ old('start_date') ?? '' }}">
                                                            @error('start_date')
                                                                <div class="invalid-feedback">
                                                                    <i class="bx bx-radio-circle"></i>
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h6 class="d-flex @error('end_date') text-danger @enderror">
                                                            Fecha de fin de la campaña</h6>
                                                        <div class="form-group">
                                                            <input type="date" name="end_date" id="end_date"
                                                                class="form-control @error('end_date') is-invalid @enderror"
                                                                placeholder="Ingrese los apellidos"
                                                                value="{{ old('end_date') ?? '' }}">
                                                            @error('end_date')
                                                                <div class="invalid-feedback">
                                                                    <i class="bx bx-radio-circle"></i>
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6 class="d-flex @error('description') text-danger @enderror">
                                                    Descrpción (Opcional)</h6>
                                                <div class="form-group">
                                                    <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description"
                                                        rows="7" placeholder="Ingrese una breve descripcion de su campaña">{{ old('description') }}</textarea>
                                                    @error('description')
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="col-3"></div>
                                                    <div class="col-6">
                                                        <button type="submit"
                                                            class="btn btn-outline-primary btn-block">
                                                            <strong>
                                                                GUARDAR
                                                            </strong>
                                                        </button>
                                                    </div>
                                                    <div class="col-3"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- SweetAlert2 -->
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>

@if ( session()->has('mensaje') )
    <script>
        $(document).ready(function() {
            setTimeout(() => {
                Swal.fire({
                    icon: "{{session('alert-type')}}",
                    title: "{{session('mensaje')}}",
                });
            }, 10);
        });
    </script>
@endif

    <script>
        $(function() {
            $("#table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        for (let i = 0; i < 8; i++) {
            let card = document.getElementById('card' + i);

            card.addEventListener('mouseenter', (e) => {
                card.className = "card card-success elevation-5 h-90";
                card.style = "cursor: pointer;"
            });

            card.addEventListener('mouseleave', (e) => {
                card.className = "card card-success elevation-2 h-90";
            });

            card.addEventListener('click', (e) => {
                document.getElementById('form' + i).submit();
            });

        }
        document.getElementById('btn_add').addEventListener('click', (e) => {
            document.getElementById('nav_add').className = 'nav-link active';
            document.getElementById('nav_list').className = 'nav-link';
            document.getElementById('tab_3').className = 'tab-pane active';
            document.getElementById('tab_2').className = 'tab-pane';
        });
    </script>
</body>
</html>
