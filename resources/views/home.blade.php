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
<body class="sidebar-collapse">
    <nav class="navbar navbar-expand navbar-primary navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block ml-5">
                <h2>My Campaign</h2>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    <p>
                    Alexander Pierce - Web Developer
                    <small>Member since Nov. 2012</small>
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                    <a href="#" class="btn btn-default btn-flat float-right btn-block">Cerrar sesión</a>
                </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div class="container">
        <section class="content-header">

        </section>
        <div class="container-fluid">
            <h1 class="mb-3">Frecuentes</h1>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ($firtsCampaigns as $campaign)
                    <div class="col">
                        <div class="card card-success h-90 elevation-2" id="card{{ $loop->index }}">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <p class="card-title font-weight-bold">{{ $campaign->name }}</p>
                                <p class="card-text">{{ $campaign->party }}</p>
                                <p class="card-text"> {{ $campaign->start_date }} - {{ $campaign->end_date }} </p>
                            </div>
                        </div>
                        <form action="{{ route('home.campaign') }}" method="POST" id="form{{ $loop->index }}">
                            @csrf
                            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Listado de campañas</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <h1><a href="{{ route('campaigns.create') }}" type="reset" class="btn btn-outline-primary align-bottom pl-5 pr-5">Agregar campaña</a></h1>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="card mr-2 ml-2">
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
                                <td> {{ $campaign->start_date }} - {{ $campaign->end_date }} </td>
                                <td>
                                    <a href="{{ route('campaigns.show', $campaign) }}" class="btn-sm btn-outline-success icon icon-left pt-2">
                                        <i class="fas fa-search"></i> Detalles
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
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
    <script>
    $(function () {
        $("#table").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
    });
    </script>
    <script>
        for ( let i = 0; i < 8; i++ ) {
            let card = document.getElementById('card' + i);

            card.addEventListener('mouseenter',  (e) => {
                card.className = "card card-success elevation-5 h-90";
                card.style="cursor: pointer;"
            });

            card.addEventListener('mouseleave', (e) => {
                card.className = "card card-success elevation-2 h-90";
            });

            card.addEventListener('click', (e) => {
                document.getElementById('form' + i).submit();
            });

        }
    </script>
</body>
</html>
